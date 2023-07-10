<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-6">
                <div class="flex justify-end p-4">
                    <a href="{{ route('admin.users.index') }}" class="rounded-lg py-2 px-3 hover:text-gray-800 font-bold text-gray-600 text-xl underline">Back</a>
                </div>
                {{-- First Division --}}
                <div class="py-3 bg-gray-50">
                    <div class="flex py-3 px-4">
                        <span class="pr-4 font-bold">Username:</span>
                        <span class="capitalize">{{ $user->name }}</span>
                    </div>
                    <div class="flex p-4">
                        <span class="pr-4 font-bold">Email:</span>
                        <span class=""> {{ $user->email }}</span>
                    </div>
                </div>
                {{-- Second Division --}}
                <div class="mt-2 p-2">
                    <h2 class="text-2xl font-bold">Roles</h2>
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900 pb-1">Assigned Permissions</label>
                        <div class="flex">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <span class="mr-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 relative capitalize">{{ $user_role->name }}
                                        <button class="absolute" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3 w-3 text-white bg-green-700 hover:bg-green-800 rounded-full">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </span>
                                </form>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-12">
                              <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <div class="mt-2">
                                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Select a role</label>
                                            <p class="mt-1 text-sm leading-6 text-gray-600">The role you choose will assigned with the chosen permission.</p>
                                            <select id="role" name="role" autocomplete="role-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 capitalize">
                                                @foreach ($roles as $role)
                                                    @if($role->name !== 'admin')
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @error('role')
                                            <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                                  <a href="{{ route('admin.roles.index') }}">Cancel</a>
                              </button>
                              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Third Division --}}
                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-bold">Permissions</h2>
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900 pb-1">Assigned Permissions</label>
                        <div class="flex">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                                <form action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <span class="mr-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 relative">{{ $user_permission->name }}
                                        <button class="absolute" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3 w-3 text-white bg-green-700 hover:bg-green-800 rounded-full">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </span>
                                </form>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-12">
                              <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <div class="mt-2">
                                            <label for="permission" class="block mb-2 text-sm font-medium text-gray-900">Select a permission</label>
                                            <p class="mt-1 text-sm leading-6 text-gray-600">The permission you choose will assigned to the the chosen user.</p>
                                            <select id="permission" name="permission" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                                @endforeach
                                            </select>
                                        @error('permission')
                                            <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                                  <a href="{{ route('admin.roles.index') }}">Cancel</a>
                              </button>
                              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
