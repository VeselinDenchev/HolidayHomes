<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="details-house-heading">
        {{ $detailedHouse->house_name }}
    </h2>Located 300 m from Kranevo Beach, Apartments Victoria offers a seasonal outdoor swimming pool, a fitness centre and air-conditioned accommodation with a balcony and free WiFi.

    The apartment provides guests with a patio, a seating area, satellite flat-screen TV, a fully equipped kitchen with a microwave and a fridge, and a private bathroom with shower and a hairdryer. An oven and stovetop are also featured, as well as a kettle and a coffee machine.

    Apartments Victoria offers a terrace.

    Guests at the accommodation can enjoy cycling nearby, or make the most of the garden.

    Albena Central Beach is 700 m from Apartments Victoria, while Black Sea Ice Arena is 500 m away. The nearest airport is Varna, 38 km from the apartment, and the property offers a paid airport shuttle service.

    Couples particularly like the location — they rated it 9.6 for a two-person trip.
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

