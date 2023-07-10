<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-6">
                {{-- Can add font-mono to class for custom --}}
                <div class="flex justify-end p-4">
                    <a href="{{ route('admin.permissions.create') }}" class="bg-green-400 rounded-lg py-2 px-3 hover:bg-green-500 font-bold text-white">Create Permissions</a>
                </div>
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">Permissions</th>
                                <th class="px-4 py-3">Roles</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Option</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($permissions as $perm)
                                    <tr class="text-gray-700">
                                <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold text-black">{{ $perm->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-xs border max-w-xs whitespace-normal">
                                    @foreach ($perm->roles as $permission_role)
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 inline-block mb-1 rounded">{{ $permission_role->name }}</span>
                                    @endforeach
                                    @if ($perm->roles->isEmpty())
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">Empty</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-xs border">
                                    @if ($perm->roles->isEmpty())
                                        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">UnUsed</span>
                                    @else
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Used</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm border">
                                    <div class="flex justify-around">
                                        <a href="{{ route('admin.permissions.edit', $perm->id) }}" class="text-blue-400 uppercase font-semibold hover:text-blue-500">Edit</a>
                                        <form action="{{ route('admin.permissions.destroy', $perm->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 uppercase font-semibold hover:text-red-500 cursor-pointer">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>



</x-admin-layout>
