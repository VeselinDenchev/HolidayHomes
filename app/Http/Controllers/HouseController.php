<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Image;
use App\Models\ObjectType;
use App\Models\PopulatedPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    public function index()
    {
       $user = auth()->user();

       $houses = DB::table('houses')
                    ->join('populated_places', 'houses.populated_place_id', '=', 'populated_places.id')
                    ->join('object_types', 'houses.object_type_id', '=', 'object_types.id')
                    ->select('houses.id', 'houses.house_name', 'populated_places.populated_place_name',
                        'object_types.object_type_name')
                    ->where('houses.user_id', 'LIKE', '%'.$user->id.'%')
                    ->get();

        return view('my_houses_list', compact('houses'));
    }

    public function add()
    {
        $populatedPlaces = DB::table('populated_places')
                            ->orderBy('populated_place_name')
                            ->get();

        $objectTypes = DB::table('object_types')->get();

        return view('add_house', compact('populatedPlaces', 'objectTypes'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'house_name' => 'required',
            'populated_place' => 'required',
            'object_type' => 'required',
            'description' => 'required',
            'count_of_rooms' => 'numeric|min:1|max:30',
            'count_of_beds' => 'numeric|min:1|max:50',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        return redirect('/my_houses');
    }

    public function edit(House $house)
    {
        $populatedPlaces = DB::table('populated_places')
                                ->orderBy('populated_place_name')
                                ->get();
        $objectTypes = DB::table('object_types')->get();
        $imageUrl = DB::table('images')
            ->where('house_id','LIKE','%'.$house->id.'%')
            ->value('url');

        $housePopulatedPlace = PopulatedPlace::where('id', 'LIKE', '%'.$house->populated_place_id.'%')
                                                    ->value('populated_place_name');
        $houseObjectType = ObjectType::where('id', 'LIKE', '%'.$house->object_type_id.'%')
                                        ->value('object_type_name');

        return view('edit_house',
                    compact('house', 'populatedPlaces', 'objectTypes', 'imageUrl', 'housePopulatedPlace', 'houseObjectType' ));
    }

    public function update(Request $request, House $house)
    {
        $imageFileName = DB::table('images')
            ->where('house_id','LIKE','%'.$house->id.'%')
            ->value('file_name');

        if (isset($_POST['delete'])) {
            $house->delete();

            $this->deleteImage($imageFileName);
            return redirect('/my_houses');
        }
        else
        {
            $this->validate($request, [
                'house_name' => 'required',
                'populated_place' => 'required',
                'object_type' => 'required',
                'description' => 'required',
                'count_of_rooms' => 'numeric|min:1|max:30',
                'count_of_beds' => 'numeric|min:1|max:50',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $house->house_name = $request->house_name;
            $house->populated_place_id = PopulatedPlace::where('populated_place_name', 'LIKE', '%'.$request->populated_place.'%')
                ->value('id');

            $house->object_type_id = ObjectType::where('object_type_name', 'LIKE', '%'.$request->object_type.'%')
                ->value('id');

            $house->description = $request->description;
            $house->count_of_rooms = $request->count_of_rooms;
            $house->count_of_beds = $request->count_of_beds;

            if($request->hasfile('image'))
            {
                $this->deleteImage($imageFileName);
                $this->uploadImage($request, $house->id);
            }

            $house->update();

            return redirect()->back()->with('status', 'House updated succesfully');
        }
    }

    public function allHouses()
    {
        if (Auth::check())
        {
            $user = auth()->user();
            $hasAnyRole = ($user->hasRole('admin') || ($user->hasRole('editor')));

            if (!$hasAnyRole)
            {
                $user->assignRole('editor');
            }
        }

        $houses = DB::table('houses')
            ->join('populated_places', 'houses.populated_place_id', '=', 'populated_places.id')
            ->join('object_types', 'houses.object_type_id', '=', 'object_types.id')
            ->join('images', 'houses.id', '=', 'images.house_id')
            ->select('houses.id', 'houses.house_name', 'populated_places.populated_place_name',
                'object_types.object_type_name', 'houses.description', 'houses.count_of_rooms', 'houses.count_of_beds',
                'images.url')
            ->get();

        return view('all_houses', compact('houses'));
    }

    public function details(House $house)
    {
        $detailedHouse = DB::table('houses')
            ->where('houses.id', 'LIKE', '%'.$house->id.'%')
            ->join('populated_places', 'houses.populated_place_id', '=', 'populated_places.id')
            ->join('object_types', 'houses.object_type_id', '=', 'object_types.id')
            ->join('images', 'houses.id', '=', 'images.house_id')
            ->select('houses.id', 'houses.house_name', 'populated_places.populated_place_name',
                'object_types.object_type_name', 'houses.description', 'houses.count_of_rooms', 'houses.count_of_beds',
                'images.url')
            ->first();

        return view('house_details', compact('detailedHouse'));
    }

    private function uploadImage(Request $request, $houseId)
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

    private function deleteImage($imageFileName)
    {
        Storage::delete($imageFileName);
        $deletedImage = DB::table('images')
            ->where('file_name', 'LIKE', '%'.$imageFileName.'%')
            ->delete();
    }
}
