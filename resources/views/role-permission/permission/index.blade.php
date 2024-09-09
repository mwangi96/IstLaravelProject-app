@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-8">
            @if(session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-200 px-6 py-4 border-b border-gray-300">
                    <h4 class="text-lg font-semibold flex justify-between items-center">
                        Permissions
                        <a href="{{ url('permissions/create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm">Add Permission</a>
                    </h4>
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 divide-y divide-gray-300 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300">
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $permission->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $permission->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                        <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded text-sm">Edit</a>
                                        <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">Delete</a>
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
