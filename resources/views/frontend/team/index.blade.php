<x-guest-layout>
    <section class="body-font overflow-hidden text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="flex flex-wrap w-full mb-10 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Team</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Every team in your system</p>
            </div>
            <div class="flex justify-end">
                @can('Assign Task')
                    <a href="{{ route('task.assign') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300 mx-2">
                        Assign Task
                    </a>
                @endcan
                @can('Take Task')
                    <a href="{{ route('task.take') }}" class="border rounded-full p-1 px-2 bg-gray-200 hover:bg-gray-300 mx-2">
                        Take Task
                    </a>
                @endcan
            </div>
            @foreach ($users as $user)
            <div class="my-8 divide-y-2 divide-gray-100 border-b border-gray-200">
                    <div class="flex flex-wrap py-8 md:flex-nowrap">
                        <div class="mb-6 flex flex-shrink-0 flex-col md:mb-0 md:w-64">
                            @php
                                $hasPermissions = false;
                            @endphp
                            @foreach ($user->roles as $user_roles)
                                {{-- @foreach ($user_permission->roles as $rolename) --}}
                                    <span class="title-font font-semibold text-gray-700 capitalize">{{ $user_roles->name }}</span>
                                    @php
                                        $hasPermissions = true;
                                    @endphp
                                {{-- @endforeach --}}
                            @endforeach
                            @if (!$hasPermissions)
                                <span class="title-font font-semibold text-gray-700">No Role</span>
                            @endif

                            <span class="mt-1 text-sm text-gray-500">{{ $user->email }}</span>
                            <a href="" class="mt-1 text-sm text-gray-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </a>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="title-font mb-2 text-2xl font-medium text-gray-900 capitalize">{{ $user->name }}</h2>
                            <div class="flex flex-row items-center">
                                Tasks:
                                @php
                                    $hasTasks = false;
                                @endphp
                                @foreach ($tasks as $task)
                                    @if ($task->user_id == $user->id)
                                        <p class="leading-relaxed pl-2">{{ $task->title }},</p>
                                        @php
                                            $hasTasks = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if (!$hasTasks)
                                    <p class="leading-relaxed pl-2">No Task</p>
                                @endif
                            </div>
                            <a class="mt-4 inline-flex items-center"
                            >Status:
                            @php
                                $hasTasks = false;
                            @endphp
                            @foreach ($tasks as $task)
                                @if ($task->user_id == $user->id)
                                    @php
                                        $hasTasks = true;
                                    @endphp
                                @endif
                            @endforeach
                            @if (!$hasTasks)
                                <span class="ml-3 mr-2 rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Free</span>
                            @else
                                <span class="ml-3 mr-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Occupied</span>
                            @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-guest-layout>
