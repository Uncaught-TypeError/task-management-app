<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-6">
                <div class="flex justify-end p-4">
                    <a href="{{ route('admin.roles.index') }}" class="bg-green-400 rounded-lg py-2 px-3 hover:bg-green-500 font-bold text-white">Back</a>
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="m-2 p-2">
                            <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="space-y-12">
                                  <div class="border-b border-gray-900/10 pb-12">
                                      <h2 class="text-base font-semibold leading-7 text-gray-900">Roles</h2>
                                      <p class="mt-1 text-sm leading-6 text-gray-600">This new role will update the old one so be careful what you create.</p>

                                      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                      <div class="sm:col-span-4">
                                          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Role Name</label>
                                          <div class="mt-2">
                                          <div class="flex rounded-md shadow-sm
                                          ring-1 ring-inset ring-gray-300
                                          focus-within:ring-2 focus-within:ring-inset
                                          focus-within:ring-indigo-600 sm:max-w-md">
                                              <input type="text" value="{{ $role->name }}" name="name" id="name"  autocomplete="off" class="block flex-1 border-0
                                              bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0
                                              sm:text-sm sm:leading-6" placeholder="">
                                          </div>
                                          @error('name')
                                            <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                        @enderror
                                      </div>
                                  </div>
                                </div>
                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                  <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                                      <a href="{{ route('admin.roles.index') }}">Cancel</a>
                                  </button>
                                  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-bold">Role Permissions</h2>
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900 pb-1">Assigned Permissions</label>
                        <div class="flex">
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                                <form action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <span class="mr-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 relative">{{ $role_permission->name }}
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
                        <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}" enctype="multipart/form-data">
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
