<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All houses') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-2xl mb-4">Houses list</div>
                </div>
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">House</th>
                        <th class="text-left p-3 px-5">Object type</th>
                        <th class="text-left p-3 px-5">Populated place</th>
                        <th class="text-left p-3 px-5">Description</th>
                        <th class="text-left p-3 px-5">Count of rooms</th>
                        <th class="text-left p-3 px-5">Count of beds</th>
                        <th class="text-left p-3 px-5">Image</th>
                        <th class="text-left p-3 px-5">Actions</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($houses as $house)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$house->house_name}}
                            </td>
                            <td class="p-3 px-5">
                                {{$house->object_type_name}}
                            </td>
                            <td class="p-3 px-5">
                                {{$house->populated_place_name}}
                            </td>
                            <td class="p-3 px-5">
                                {{$house->description}}
                            </td>
                            <td class="p-3 px-5">
                                {{$house->count_of_rooms}}
                            </td>
                            <td class="p-3 px-5">
                                {{$house->count_of_beds}}
                            </td>
                            <img src="{{$house->url}}">

                            <td class="p-3 px-5">

                                <a href="/details/house/{{$house->id}}" name="edit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-black py-1 px-2 rounded focus:outline-none focus:shadow-outline">Details</a>

                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>



