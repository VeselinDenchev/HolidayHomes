<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="list-heading">
            {{ __('Edit object type') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="margin-left: 35em; margin-right: auto; width: 50%; font-size: 13pt">

                <form method="POST" action="/object_type/{{ $objectType->id }}">

                    <div class="form-group">
                        <label for="populated_place_name" style="margin-right: 1em">Name</label>
                        <input type="text" name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" value="{{$objectType->object_type_name}}">
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <div class="form-group" style="margin-left: 2em; margin-top: 3em">
                        <button type="submit" name="update" class="btn btn-primary" style="background-color:#b0b435">Update object type</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
