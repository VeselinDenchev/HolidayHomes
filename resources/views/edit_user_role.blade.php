<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user\'s role') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/user/{{ $user->id }}">
                    <div class="form-group">
                        <p>{{ $user->name }}</p>
                        <input list="roles" name="role">
                        <datalist id="roles">
                            @foreach($roles as $role)
                                <option value="{{$role->roleName}}">
                            @endforeach
                        </datalist>
                        </input>
                        @if ($errors->has('role'))
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update user's role</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

