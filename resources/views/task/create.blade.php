<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                Create Tasks
            </h2>
            <a href="{{ route('task.index') }}" class="border rounded-full p-2 bg-gray-200 hover:bg-gray-300">
                Back
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Tasks</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">This new task will be displayed publicly so be careful what you create.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Task Name</label>
                                    <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm
                                    ring-1 ring-inset ring-gray-300
                                    focus-within:ring-2 focus-within:ring-inset
                                    focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="title" id="title"  autocomplete="off" class="flex-1 border-0
                                        py-1.5 pl-2 bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required>
                                    </div>
                                    @error('title')
                                        <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-4 mt-10">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Task Description</label>
                                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="" required></textarea>
                                    @error('description')
                                        <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                          <a href="">Cancel</a>
                      </button>
                      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>