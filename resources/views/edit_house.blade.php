<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit house') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                @if (session('status'))
                    <h6 class class="alert-alert success">{{ session('status') }}</h6>
                @endif

                <form method="POST" action="/house/{{ $house->id }}" enctype="multipart/form-data">

                    <div class="form-group">
                        <textarea name="house_name" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$house->house_name}}</textarea>
                        @if ($errors->has('house_name'))
                            <span class="text-danger">{{ $errors->first('house_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input list="populated_places" name="populated_place">
                        <datalist id="populated_places">
                            @foreach($populatedPlaces as $place)
                                <option value="{{$place->populated_place_name}}">
                            @endforeach
                        </datalist>
                        </input>
                        @if ($errors->has('populated_place'))
                            <span class="text-danger">{{ $errors->first('populated_place') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input list="object_types" name="object_type">
                        <datalist id="object_types">
                            @foreach($objectTypes as $type)
                                <option value="{{$type->object_type_name}}">
                            @endforeach
                        </datalist>
                        </input>
                        @if ($errors->has('object_type'))
                            <span class="text-danger">{{ $errors->first('object_type') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <textarea name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$house->description}}</textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" name="count_of_rooms" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  value='{{$house->count_of_rooms}}'>

                        @if ($errors->has('count_of_rooms'))
                            <span class="text-danger">{{ $errors->first('count_of_rooms') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" name="count_of_beds" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  value='{{$house->count_of_beds}}'>

                        @if ($errors->has('count_of_beds'))
                            <span class="text-danger">{{ $errors->first('count_of_beds') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <img src="{{$imageUrl}}">
                        <input type="file" name="image" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">

                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" name="update" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update object type</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
