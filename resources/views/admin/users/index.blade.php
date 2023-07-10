<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-6">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Role</th>
                                <th class="px-4 py-3">Permission</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Option</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($users as $user)
                                {{-- @if ($role->name !== 'admin') --}}
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        {{-- @foreach ($user->roles as $user_role) --}}
                                        <div class="flex items-center text-sm">
                                            {{-- <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div> --}}
                                            <div>
                                                <p class="font-semibold text-black capitalize">{{ $user->name }}</p>
                                                {{-- <p class="text-xs text-gray-600 capitalize">{{ $user_role->name }}</p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        <p class="font-semibold text-black text-sm">{{ $user->email }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-xs border max-w-xs whitespace-normal">
                                        @php
                                            $hasPermissions = false;
                                        @endphp
                                        @foreach ($user->roles as $user_roles)
                                            {{-- @foreach ($user_permission->roles as $rolename) --}}
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 inline-block mb-1 rounded capitalize">{{ $user_roles->name }}</span>
                                                @php
                                                    $hasPermissions = true;
                                                @endphp
                                            {{-- @endforeach --}}
                                        @endforeach
                                        @if (!$hasPermissions)
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Empty</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-xs border max-w-xs whitespace-normal">
                                        @php
                                            $hasPermissions = false;
                                        @endphp
                                        @foreach ($user->roles as $user_permission)
                                            @foreach ($user_permission->permissions as $permname)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 inline-block mb-1 rounded">{{ $permname->name }}</span>
                                                @php
                                                    $hasPermissions = true;
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        @if (!$hasPermissions)
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Empty</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        @php
                                            $hasOnlinePermission = false;
                                            $hasOfflinePermission = true;
                                        @endphp

                                        @foreach ($user->roles as $user_permission)
                                            @if ($user_permission->permissions->isEmpty())
                                                @php
                                                    $hasOfflinePermission = true;
                                                @endphp
                                            @else
                                                @php
                                                    $hasOnlinePermission = true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($hasOnlinePermission)
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Online</span>
                                        @elseif ($hasOfflinePermission)
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">Offline</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <div class="flex justify-between">
                                            <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-400 uppercase font-semibold hover:text-blue-500 sm:px-0 px-2">Roles</a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 uppercase font-semibold hover:text-red-500 cursor-pointer sm:px-0 px-2">Delete</button>
                                            </form>
                                        </div>
                                        {{-- @endforeach --}}
                                    </td>
                                </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


</x-admin-layout>
