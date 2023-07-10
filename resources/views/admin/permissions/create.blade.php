<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-6">
                <div class="flex justify-end p-4">
                    <a href="{{ route('admin.permissions.index') }}" class="bg-green-400 rounded-lg py-2 px-3 hover:bg-green-500 font-bold text-white">Back</a>
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="m-2 p-2">
                            <form method="POST" action="{{ route('admin.permissions.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="space-y-12">
                                  <div class="border-b border-gray-900/10 pb-12">
                                      <h2 class="text-base font-semibold leading-7 text-gray-900">Permissions</h2>
                                      <p class="mt-1 text-sm leading-6 text-gray-600">This new permission will be assigned to a role you choose.</p>

                                      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                      <div class="sm:col-span-4">
                                          <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Permission Name</label>
                                          <div class="mt-2">
                                          <div class="flex rounded-md shadow-sm
                                          ring-1 ring-inset ring-gray-300
                                          focus-within:ring-2 focus-within:ring-inset
                                          focus-within:ring-indigo-600 sm:max-w-md">
                                              <input type="text" name="name" id="name"  autocomplete="off" class="block flex-1 border-0
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
                                      <a href="{{ route('admin.permissions.index') }}">Cancel</a>
                                  </button>
                                  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-admin-layout>
