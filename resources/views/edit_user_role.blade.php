<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="list-heading">
            Edit user's role
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="margin-left: 35.3em; margin-right: auto; width: 50%; font-size: 13pt">
                <form method="POST" action="/user/{{ $user->id }}">
                    <div class="form-group" style="margin-left: 2.3em;">
                        <label for="role" style="margin-right: 1em">Role</label>
                        <select id="roles" name="role">
                            @foreach($roles as $role)
                                <option value="{{$role->roleName}}">{{$role->roleName}}</option>
                            @endforeach
                        </select>
                        </input>
                        @if ($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                    <div class="form-group" style="margin-left: 2em; margin-top: 3em">
                        <button type="submit" name="update" class="btn btn-primary" style="background-color:#b0b435">Update user's role</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

