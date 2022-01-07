<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Image;
use App\Models\ObjectType;
use App\Models\PopulatedPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    public function index()
    {
       $houses = DB::table('houses')
            ->join('populated_places', 'houses.populated_place_id', '=', 'populated_places.id')
            ->join('object_types', 'houses.object_type_id', '=', 'object_types.id')
            /*->join('images', 'houses.id', '=', 'images.house_id')*/
            ->select('houses.id', 'houses.house_name', 'populated_places.populated_place_name',
                'object_types.object_type_name') //, 'images.url'
            ->get();
       var_dump($houses);

        return view('houses_list', compact('houses'));
    }

    public function add()
    {
        $populatedPlaces = DB::table('populated_places')->get();
        $objectTypes = DB::table('object_types')->get();

        return view('add_house', compact('populatedPlaces', 'objectTypes'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $house = new House();
        $house->house_name = $request->house_name;
        $house->populated_place_id = PopulatedPlace::where('populated_place_name', 'LIKE', '%'.$request->populated_place.'%')
                                                    ->value('id');

        $house->object_type_id = ObjectType::where('object_type_name', 'LIKE', '%'.$request->object_type.'%')
                                            ->value('id');

        $house->description = $request->description;
        $house->count_of_rooms = $request->count_of_rooms;
        $house->count_of_beds = $request->count_of_beds;
        $house->user_id = auth()->user()->id;

        $house->save();

        $this->uploadImage($request, $house->id);

        return redirect('/houses');
    }

    public function edit(House $house)
    {
        $populatedPlaces = DB::table('populated_places')->get();
        $objectTypes = DB::table('object_types')->get();
        $imageUrl = DB::table('images')
            ->where('house_id','LIKE','%'.$house->id.'%')
            ->value('url');

        return view('edit_house', compact('house', 'populatedPlaces', 'objectTypes', 'imageUrl'));
    }

    public function update(Request $request, House $house)
    {
        $imageFileName = DB::table('images')
            ->where('house_id','LIKE','%'.$house->id.'%')
            ->value('file_name');

        if (isset($_POST['delete'])) {
            $house->delete();

            $this->deleteImage($imageFileName);
            return redirect('/houses');
        }
        else
        {
            $this->validate($request, [
                //'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $house->house_name = $request->house_name;
            $house->populated_place_id = PopulatedPlace::where('populated_place_name', 'LIKE', '%'.$request->populated_place.'%')
                ->value('id');

            $house->object_type_id = ObjectType::where('object_type_name', 'LIKE', '%'.$request->object_type.'%')
                ->value('id');

            $house->description = $request->description;
            $house->count_of_rooms = $request->count_of_rooms;
            $house->count_of_beds = $request->count_of_beds;

            var_dump($request->hasfile('image'));
            if($request->hasfile('image'))
            {
                $this->deleteImage($imageFileName);
                $this->uploadImage($request, $house->id);
            }

            $house->update();

            return redirect()->back()->with('status', 'House image added succesfully');
        }
    }

    private function uploadImage(Request $request, string $houseId)
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $img = new Image();
        $img->file_name = $imageName;
        $img->path = public_path('storage') . DIRECTORY_SEPARATOR . $imageName;
        $img->url = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $imageName;
        $img->house_id = $houseId;

        $img->save();
    }

    public function deleteImage($imageFileName)
    {
        Storage::delete($imageFileName);
        $deletedImage = DB::table('images')
            ->where('file_name', 'LIKE', '%'.$imageFileName.'%')
            ->delete();

        return redirect('/houses');
    }
}
