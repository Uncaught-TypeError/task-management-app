<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight capitalize">
                Tasks
            </h2>
            <a href="{{ route('task.create') }}" class="border rounded-full p-2 bg-gray-200 hover:bg-gray-300">
                Create Task
            </a>
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
                                <th class="px-4 py-3">Option</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($tasks as $ts)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold text-black capitalize">{{ $ts->title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        <p class="font-semibold text-black text-sm">{{ $ts->description }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <div class="flex justify-between">
                                            <a href="" class="text-blue-400 uppercase font-semibold hover:text-blue-500 sm:px-0 px-2">Edit</a>
                                            <form action="" method="POST" onsubmit="return confirm('Are you sure?');">
                                                {{-- @csrf --}}
                                                {{-- @method('DELETE') --}}
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
</x-app-layout>