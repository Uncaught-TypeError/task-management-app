<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <a href="{{ route('task.index') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300">
                Back
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('task.submit.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-xl font-semibold leading-7 text-gray-900">Task Submission</h2>
                            <p class="mt-1 text-sm leading-6 text-red-600">* This new task will be submitted publicly so be careful what you submit. There is no turning back! *</p>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    @foreach ($tasks as $task)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="task_ids[]" value="{{ $task->id }}" class="form-checkbox">
                                        <span class="ml-2">{{ $task->title }}</span>
                                    </label>
                                    @endforeach
                                    @error('task_ids')
                                        <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-full mt-10">
                                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Anything you would like to add?</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3" class="block w-full rounded-md
                                    border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                    ring-inset ring-gray-300 placeholder:text-gray-400
                                    focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                                    sm:leading-6"></textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">Feedback about the task.</p>
                                @error('description')
                                    <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-full mt-10">
                                <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">File Submission</label>
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">The uploaded file won't appear here.</p>
                                @error('image')
                                    <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                            <a href="{{ route('task.index') }}">Cancel</a>
                        </button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

