<x-guest-layout>
    <section class="body-font overflow-hidden text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-12 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">Your Messages</h1>
            </div>
            {{-- {{ Auth::user()->id }} --}}
            @php
                $messageCount = 1;
            @endphp
            @foreach ($invitations as $invitation)
            @php
                $senderName = null;
                foreach ($users as $user) {
                    if ($invitation->sender_id == $user->id) {
                        $senderName = $user->name;
                    }
                }
            @endphp
            {{-- @foreach ($users as $user) --}}
                @if ($invitation->receipient_id == Auth::user()->id)
                <div class="-my-8 divide-y-2 divide-gray-100">
                    <div class="flex flex-wrap py-8 md:flex-nowrap">
                        <div class="mb-6 flex flex-shrink-0 flex-col md:mb-0 md:w-64">
                            <span class="title-font font-semibold text-gray-700">Message {{ $messageCount }}</span>
                            <span class="mt-1 text-sm text-gray-500">{{ $invitation->created_at }}</span>
                        </div>
                        <div class="md:flex-grow">
                            <h2 class="title-font mb-2 text-2xl font-medium text-gray-900">Message from {{ $senderName }}</h2>
                            <p class="mb-4 leading-relaxed">{{ $invitation->message }}</p>
                            <div class="mb-4">
                                @if ($invitation->status == 'accepted')
                                    <span class="text-green-400">The invitation has already {{ $invitation->status }}!</span>
                                @elseif ($invitation->status == 'pending')
                                    <span class="text-orange-400">The invitation is {{ $invitation->status }}...</span>
                                @else
                                    <span class="text-red-400">The invitation has already {{ $invitation->status }}!</span>
                                @endif
                            </div>
                            <div class="flex gap-3">
                                @if ($invitation->status == 'pending')
                                <form action="{{ route('invitation.accept', $invitation) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="flex rounded border-0 bg-blue-400 px-3 py-2 text-base text-white hover:bg-blue-500 focus:outline-none">Accept Invitation</button>
                                </form>
                                <form action="{{ route('invitation.reject', $invitation) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="flex rounded border-0 bg-red-400 px-3 py-2 text-base text-white hover:bg-red-500 focus:outline-none">Declined Invitation</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $messageCount++;
                @endphp
                @endif
            {{-- @endforeach --}}
            @endforeach
        </div>
    </section>
</x-guest-layout>
