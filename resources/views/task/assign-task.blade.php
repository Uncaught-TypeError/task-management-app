<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                Assign Task
            </h2>
            <a href="{{ route('task.index') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300">
                Back
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('assign.user') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-xl font-semibold leading-7 text-gray-900">Tasks</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">This new task will be displayed publicly so be careful what you create.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="task_id" class="block mb-2 text-sm font-medium text-gray-900">Select Task</label>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">The task you choose will assigned with the relative user.</p>
                                    <select id="task_id" name="task_id" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        @foreach ($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('task_id')
                                        <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-4 mt-10">
                                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900">Select User</label>
                                    <p class="mt-1 text-sm leading-6 text-gray-600">The user you choose will assigned with the relative task.</p>
                                    <select id="user_id" name="user_id" autocomplete="permission-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        @foreach ($users as $user)
                                            @if($user->hasPermissionTo('Take Task') )
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                            <a href="{{ route('task.index') }}">Cancel</a>
                        </button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

