<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="w-full">
            @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('status') }}</div>
            @endif
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-800 text-white p-4 rounded-t-lg flex justify-between items-center">
                    <h4 class="text-xl">Role: {{$roles->name}}</h4>
                    <a href="{{ url('roles') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
                <div class="p-4">
                    <form action="{{ url('roles/'.$roles->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')
    
                        <div class="mb-4">
                            @error('permission')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <label class="block text-gray-700">Permissions</label>
    
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach ($permissions as $permission)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" 
                                            name="permission[]" 
                                            value="{{ $permission->name }}" 
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                            class="form-checkbox h-5 w-5 text-gray-600"
                                        />
                                        <span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
    
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
