<?php

namespace App\Http\Controllers;

use App\Models\House;
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
                'object_types.object_type_name') //'images.path'*/
            ->get();

        return view('houses_list', compact('houses'));
    }

    public function add()
    {
        return view('add_object_type');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
        $objectType = new ObjectType();
        $objectType->name = $request->description;
        $objectType->save();
        return redirect('/object_types');
    }

    public function edit(ObjectType $objectType)
    {
        return view('edit_object_type', compact('objectType'));
    }

    public function update(Request $request, ObjectType $objectType)
    {
        if (isset($_POST['delete'])) {
            $objectType->delete();
            return redirect('/object_types');
        } else {
            $this->validate($request, [
                'description' => 'required'
            ]);
            $objectType->name = $request->description;
            $objectType->save();
            return redirect('/object_types');
        }
    }
}
