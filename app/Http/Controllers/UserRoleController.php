<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
                    ->join('model_has_roles', 'model_id', '=', 'users.id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->select('users.id as userId', 'users.name as username', 'roles.id as roleId', 'roles.name as roleName')
                    ->get();

        return view('users_list', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = DB::table('roles')
                ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->select('roles.id', 'roles.name as roleName', 'model_has_roles.role_id')
                ->get();

        return view('edit_user_role', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $modelHasRoleId = DB::table('model_has_roles')
            ->where('model_id', 'LIKE', '%'.$user->id.'%')
            ->value('role_id');

        switch ($request->role)
        {
            case 'admin':
                if ($modelHasRoleId == 2)
                {
                    DB::table('model_has_roles')
                        ->where('model_id', $user->id)
                        ->update(['role_id' => "1"]);
                }
                break;

            case 'editor':
                if ($modelHasRoleId == 1)
                {
                    DB::table('model_has_roles')
                        ->where('model_id', $user->id)
                        ->update(['role_id' => "2"]);
                }
                break;
        }

        return redirect('/users');
    }
}
