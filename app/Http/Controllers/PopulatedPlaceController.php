<?php

namespace App\Http\Controllers;

use App\Models\PopulatedPlace;
use Illuminate\Http\Request;

class PopulatedPlaceController extends Controller
{
    public function index()
    {
        $places = PopulatedPlace::all();
        return view('populated_places_list', compact('places'));
    }

    public function add()
    {
        return view('add_populated_place');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
        $place = new PopulatedPlace();
        $place->populated_place_name = $request->description;
        $place->save();
        return redirect('/populated_places');
    }

    public function edit(PopulatedPlace $place)
    {
        return view('edit_populated_place', compact('place'));
    }

    public function update(Request $request, PopulatedPlace $place)
    {
        if(isset($_POST['delete'])) {
            $place->delete();
            return redirect('/populated_places');
        }
        else
        {
            $this->validate($request, [
                'description' => 'required'
            ]);
            $place->name = $request->description;
            $place->save();
            return redirect('/populated_places');
        }
    }
}
