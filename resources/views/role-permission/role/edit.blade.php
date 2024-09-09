@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="flex justify-center">
            <div class="w-full max-w-md sm:max-w-lg">

                @if ($errors->any())
                <ul class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 rounded-md">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-100 px-4 sm:px-6 py-4 border-b border-gray-200">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Edit Role
                            <a href="{{ url('roles') }}" class="text-red-600 hover:text-red-800 text-sm">Back</a>
                        </h4>
                    </div>
                    <div class="p-4 sm:p-6">
                        <form action="{{ url('roles/'.$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-medium">Role Name</label>
                                <input type="text" name="name" id="name" value="{{ $role->name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-base text-sm" />
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
