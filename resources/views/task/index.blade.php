<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                Tasks
            </h2>
            <div class="flex items-center">
                <a href="{{ route('task.create') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300 mx-2">
                    Create Task
                </a>
                <a href="{{ route('task.assign') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300 mx-2">
                    Assign Task
                </a>
                @can('Take Task')
                    <a href="{{ route('task.take') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300 mx-2">
                    Take Task
                    </a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Assigned Users</th>
                                <th class="px-4 py-3">Completion</th>
                                <th class="px-4 py-3">Option</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($tasks as $task)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold text-black capitalize">{{ $task->title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        <p class="font-semibold text-black text-sm">{{ $task->description }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        @if ($task->user_id === null)
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">Empty</span>
                                        @else
                                            @foreach ($users as $user)
                                                @if ($task->user_id === $user->id)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $user->name }}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        @if ($task->completion == false)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-2 my-1 w-5 h-5 text-red-700">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-2 my-1 w-5 h-5 text-green-700">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <div class="flex justify-evenly">
                                            <a href="{{ route('task.edit', $task->id) }}" class="text-blue-400 uppercase font-semibold hover:text-blue-500 sm:px-0 px-2">Edit</a>
                                            <form action="{{ route('task.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 uppercase font-semibold hover:text-red-500 cursor-pointer sm:px-0 px-2">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('Take Task')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                    Your Tasks
                </h2>
                <div class="flex items-center">
                    @can('Submit Task')
                        <a href="{{ route('task.submit', ['user_id' => Auth::user()->id]) }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300 mx-2">
                            Submit Task
                        </a>
                    @endcan
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Task Name</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3">Completion</th>
                                <th class="px-4 py-3">Option</th>
                                </tr>
                            </thead>
                            {{-- @php
                                foreach ($users as $user) {
                                    if ($user->name == Auth::user()->name) {
                                        dd($user->name);
                                    }
                                }
                            @endphp --}}
                            <tbody class="bg-white">
                                @foreach ($users as $user)
                                {{-- @php
                                    if($user->name == Auth::user()->name){
                                        dd($user->id);
                                    }
                                @endphp --}}
                                    @if ($user->name == Auth::user()->name)
                                        @foreach ($tasks as $task)
                                            @if ($user->id == $task->user_id)
                                                <tr class="text-gray-700">
                                                    <td class="px-4 py-3 border">
                                                        <div class="flex items-center text-sm">
                                                            <div>
                                                                <p class="font-semibold text-black capitalize">{{ $task->title }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-4 py-3 text-xs border">
                                                        <p class="font-semibold text-black text-sm">{{ $task->description }}</p>
                                                    </td>
                                                    <td class="px-4 py-3 text-xs border">
                                                        @if ($task->completion == false)
                                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">No</span>
                                                        @else
                                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Yes</span>
                                                        @endif
                                                    </td>

                                                    <td class="px-4 py-3 text-sm border">
                                                        <div class="flex justify-evenly">
                                                            <a href="" class="text-red-400 uppercase font-semibold hover:text-red-500 sm:px-0 px-2">Remove Task</a>
                                                            {{-- <form action="" method="POST" onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-400 uppercase font-semibold hover:text-red-500 cursor-pointer sm:px-0 px-2">Delete</button>
                                                            </form> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @auth
        @unless(Auth::user()->roles->isEmpty())
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                        Completed Tasks
                    </h2>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">Task Name</th>
                                    <th class="px-4 py-3">Description</th>
                                    <th class="px-4 py-3">Assigned User</th>
                                    <th class="px-4 py-3">Feedback</th>
                                    <th class="px-4 py-3">Grading</th>
                                    <th class="px-4 py-3">Response</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($tasks as $task)
                                        @if ($task->completion == true)
                                            <tr class="text-gray-700">
                                                <td class="px-4 py-3 border">
                                                    <div class="flex items-center text-sm">
                                                        <div>
                                                            <p class="font-semibold text-black capitalize">{{ $task->title }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-xs border">
                                                    <p class="font-semibold text-black text-sm">{{ $task->description }}</p>
                                                </td>
                                                <td class="px-4 py-3 text-xs border">
                                                    @foreach ($users as $user)
                                                        @if ($task->user_id == $user->id)
                                                            <p class="font-semibold text-black text-sm">{{ $user->name }}</p>
                                                        @endif
                                                    @endforeach

                                                </td>
                                                <td class="px-4 py-3 text-xs border">
                                                    <span class="ml-3 mr-2 rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">None</span>
                                                </td>
                                                <td class="px-4 py-3 text-xs border">
                                                    <span class="font-semibold text-black text-sm">{{ number_format(rand(1, 99) / 10, 1) }}</span>
                                                </td>
                                                <td class="px-4 py-3 text-sm border">
                                                    <div class="flex justify-evenly">
                                                        @can('Give Feedback')
                                                        <a href="" class="text-green-400 uppercase font-semibold hover:text-green-500 sm:px-0 px-2">Give Feedback</a>
                                                        @endcan
                                                        @can('Check Feedback')
                                                        <a href="" class="text-green-400 uppercase font-semibold hover:text-green-500 sm:px-0 px-2">Check Feedback</a>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endunlessrole
    @endauth


</x-app-layout>
