<x-app-layout>
    <div class="container mx-auto mt-12">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">

                @if ($errors->any())
                <ul class="bg-yellow-200 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="bg-white shadow-md rounded-lg">
                    <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                        <h4 class="text-lg font-semibold">Edit Role
                            <a href="{{ url('roles') }}" class="text-red-600 hover:text-red-800 float-right">Back</a>
                        </h4>
                    </div>
                    <div class="p-6">
                        <form action="{{ url('roles/'.$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="" class="block text-gray-700">Role Name</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" />
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
