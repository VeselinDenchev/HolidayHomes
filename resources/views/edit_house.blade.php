<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="list-heading">
            {{ __('Edit house') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" style="margin-left: 35em; margin-right: auto; width: 50%; font-size: 13pt">
                @if (session('status'))
                    <h6 class class="alert alert-success" style="margin-bottom: 3em;">{{ session('status') }}</h6>
                @endif

                <form method="POST" action="/house/{{ $house->id }}" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="house_name" style="margin-right: 5.1em">Name</label>
                        <input type="text" name="house_name" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" value="{{$house->house_name}}">
                        @if ($errors->has('house_name'))
                            <span class="text-danger">{{ $errors->first('house_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                            <label for="populated_place" style="margin-right: 1em">Populated place</label>
                            <select id="populated_places" name="populated_place">
                                @foreach($populatedPlaces as $place)
                                    @if($place->populated_place_name == $housePopulatedPlace)
                                    <option value="{{$place->populated_place_name}}" selected>{{$place->populated_place_name}}</option>
                                    @else
                                    <option value="{{$place->populated_place_name}}">{{$place->populated_place_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @if ($errors->has('populated_place'))
                            <span class="text-danger">{{ $errors->first('populated_place') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                            <label for="object_type" style="margin-right: 3em">Object type</label>
                            <select id="object_types" name="object_type">
                                @foreach($objectTypes as $type)
                                    @if($type->object_type_name == $houseObjectType)
                                        <option value="{{$type->object_type_name}}" selected>{{$type->object_type_name}}</option>
                                    @else
                                        <option value="{{$type->object_type_name}}">{{$type->object_type_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @if ($errors->has('object_type'))
                            <span class="text-danger">{{ $errors->first('object_type') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="description" style="margin-right: 1em">Description</label>
                        <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" style="display: block; width: 50%; height: 15em; margin-left: 7.8em; margin-top: -2em">{{$house->description}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="count_of_rooms" style="margin-right: 1.3em">Count of rooms</label>
                        <input type="number" name="count_of_rooms" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  value='{{$house->count_of_rooms}}'>
                        @if ($errors->has('count_of_rooms'))
                            <span class="text-danger">{{ $errors->first('count_of_rooms') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="count_of_beds" style="margin-right: 1.9em">Count of beds</label>
                        <input type="number" name="count_of_beds" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  value='{{$house->count_of_beds}}'>
                        @if ($errors->has('count_of_beds'))
                            <span class="text-danger">{{ $errors->first('count_of_beds') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image" style="margin-right: 5em">Image</label>
                        <img src="{{$imageUrl}}" style="width: 50%; height: 50%">
                        <input type="file" name="image" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" style="margin-top: 2em; margin-left: 7.7em; width: 50%">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div class="form-group" style="margin-top: 5em">
                        <button type="submit" name="update" class="btn btn-primary" style="background-color:#b0b435;">Update house</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
