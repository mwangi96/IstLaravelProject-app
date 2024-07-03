<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-100 px-4 py-3">
                        <h4 class="text-lg font-semibold flex justify-between items-center">
                            Edit User
                            <a href="{{url('users')}}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition">Back</a>
                        </h4>
                    </div>
                    <div class="p-4">
                        <form action="{{url('users/'.$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" name="username" value="{{$user->username}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @error('username') <span class="text-red-600 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" name="email" readonly value="{{$user->email}}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="text" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @error('password') <span class="text-red-600 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="roles" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select name="roles[]" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{$role}}" {{in_array($role, $userRoles)? 'selected':''}}>{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('roles') <span class="text-red-600 text-sm">{{$message}}</span> @enderror
                            </div>
                            <div>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
