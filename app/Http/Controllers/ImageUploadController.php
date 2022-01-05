<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        $img = new Image();
        $img->description = $imageName;
        $img->path = public_path('images') . DIRECTORY_SEPARATOR . $imageName;
        $img->url = 'images' . DIRECTORY_SEPARATOR . $imageName;
        $img->save();

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function index() {
        $img = Image::all();
        return view('image_list', compact('img'));
    }

    public function delete(Request $request, Image $img)
    {
        if (isset($_POST['delete'])) {
            unlink($img->path);
            $img->delete();
            return redirect('/image');
        }
    }
}
