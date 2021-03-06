<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="details-house-heading">
        {{ $detailedHouse->house_name }}
    </h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <div class="form-group">
                        <img src="{{$detailedHouse->url}}" id="details-house-image">
                    </div>


                    <div class="form-group">
                        <label>Populated place:</label>
                        {{$detailedHouse->populated_place_name}}
                    </div>

                    <div class="form-group">
                        <label>Object type:</label>
                        {{$detailedHouse->object_type_name}}
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        {{$detailedHouse->description}}
                    </div>

                    <div class="form-group">
                        <label>Count of rooms:</label>
                        {{$detailedHouse->count_of_rooms}}
                    </div>

                    <div class="form-group">
                        <label>Count of beds:</label>
                        {{$detailedHouse->count_of_beds}}
                    </div>


                    {{ csrf_field() }}
            </div>
        </div>
    </div>
</x-app-layout>


<!-- -->

