<?php

namespace App\Http\Controllers;

use App\Models\ObjectType;
use Illuminate\Http\Request;

class ObjectTypeController extends Controller
{
    public function index()
    {
        $objectType = ObjectType::all();
        return view('object_types_list', compact('objectType'));
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
