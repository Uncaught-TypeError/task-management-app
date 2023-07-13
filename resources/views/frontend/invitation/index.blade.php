<x-guest-layout>
    <section class="body-font relative text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-12 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">Team Up</h1>
                <p class="mx-auto text-base leading-relaxed lg:w-2/3">Think carefully before sending the invitation</p>
            </div>
            <form method="POST" action="{{ route('invitations.send') }}">
                @csrf
                <div class="mx-auto md:w-2/3 lg:w-1/2">
                    <div class="-m-2 flex flex-wrap">
                        <div class="w-1/2 p-2">
                            <div class="relative">
                                <label for="sender_email" class="text-sm leading-7 text-gray-600">Sender Email</label>
                                <input type="email" id="sender_email" name="sender_email" class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" value="{{ Auth::user()->email }}" readonly />
                            </div>
                        </div>
                        <div class="w-1/2 p-2">
                            <div class="relative">
                                <label for="recipient_email" class="text-sm leading-7 text-gray-600">Recipient Email</label>
                                <input type="email" id="recipient_email" name="recipient_email" class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" value="{{ $user->email }}" readonly />
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <div class="relative">
                                <label for="message" class="text-sm leading-7 text-gray-600">Message</label>
                                <textarea id="message" name="message" class="h-32 w-full resize-none rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <button class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>
