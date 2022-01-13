<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="list-heading">
            Populated places list
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex">
                    <div class="flex-auto text-right mt-2">
                        <a href="/populated_place" class="btn btn-primary" style="background-color: #b0b435; border: 0">Add new populated place</a>
                    </div>
                </div>
                <table class="w-full text-md rounded mb-4" style="margin-left: auto; margin-right: auto; width: 50%; font-size: 13pt">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Populated place</th>
                        <th class="text-left p-3 px-5">Actions</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($places as $populatedPlace)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$populatedPlace->populated_place_name}}
                            </td>
                            <td class="p-3 px-5">
                                <a href="/populated_place/{{$populatedPlace->id}}" name="edit" class="btn btn-dark" style="background-color: black">Edit</a>
                                <form action="/populated_place/{{$populatedPlace->id}}" class="inline-block" style="display: inline; margin-left: 0.5em">
                                    <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
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

