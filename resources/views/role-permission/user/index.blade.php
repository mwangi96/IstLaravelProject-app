@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="p-4">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                    <h4 class="text-lg font-semibold mb-2 sm:mb-0">Users</h4>
                    <a href="{{ url('users/create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase bg-blue-500 hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition">Add User</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">{{ $user->id }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">{{ $user->username }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">{{ $user->email }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                            <span class="inline-block bg-blue-500 rounded-full px-3 py-1 text-xs font-semibold text-white mr-2">{{ $rolename }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ url('users/'.$user->id.'/edit') }}" class="text-indigo-600 hover:text-indigo-900 text-xs">Edit</a>
                                    <a href="{{ url('users/'.$user->id.'/delete') }}" class="text-red-600 hover:text-red-900 mx-2 text-xs">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
