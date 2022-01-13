<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="list-heading">
            Users' roles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <table class="w-full text-md rounded mb-4" style="margin-left: auto; margin-right: auto; width: 50%; font-size: 13pt">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">User</th>
                        <th class="text-left p-3 px-5">Role</th>
                        <th class="text-left p-3 px-5">Action</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-orange-100">
                            <td class="p-3 px-5">
                                {{$user->username}}
                            </td>
                            <td class="p-3 px-5">
                                {{$user->roleName}}
                            </td>
                            <td class="p-3 px-5">
                                <a href="/user/{{$user->userId}}" name="edit"  class="btn btn-dark" style="background-color: black">Edit role</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>


