<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\ObjectType;
use App\Models\PopulatedPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HousesController extends Controller
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
            'description' => 'required'
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
        $house->user_id = 1;

        $house->save();
        return redirect('/houses');
    }

    public function edit(House $house)
    {
        return view('add_house', compact('house'));
    }

    public function update(Request $request, House $house)
    {
        if (isset($_POST['delete'])) {
            $house->delete();
            return redirect('/house');
        } else {
            $this->validate($request, [
                'description' => 'required'
            ]);
            $house->name = $request->description;
            $house->save();
            return redirect('/houses');
        }
    }
}
