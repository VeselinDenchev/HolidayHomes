<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add house') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

                <form method="POST" action="/house">

                    <div class="form-group">
                        <input type="text" name="house_name" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter a house name'></input>

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
                        <input type="text" name="description" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter description'></input>

                        @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" name="count_of_rooms" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter the count of rooms'></input>

                        @if ($errors->has('count_of_rooms'))
                            <span class="text-danger">{{ $errors->first('count_of_rooms') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="number" name="count_of_beds" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"  placeholder='Enter the count of beds'></input>

                        @if ($errors->has('count_of_beds'))
                            <span class="text-danger">{{ $errors->first('count_of_beds') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit">Add house</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

