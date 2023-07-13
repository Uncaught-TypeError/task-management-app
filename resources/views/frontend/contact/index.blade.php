<x-guest-layout>
    <section class="body-font relative text-gray-600">
        <div class="container mx-auto px-5 py-24">
            {{-- <div class="border border-gray-100 p-3"> --}}
                <div class="mb-12 flex w-full flex-col text-center">
                    <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">Contact Us</h1>
                    <p class="mx-auto text-base leading-relaxed lg:w-2/3">Send mail to us regarding the problem you are having.</p>
                </div>
                <div class="mx-auto md:w-2/3 lg:w-1/2">
                    <div class="-m-2 flex flex-wrap">
                    <div class="w-1/2 p-2">
                        <div class="relative">
                        <label for="name" class="text-sm leading-7 text-gray-600">Name</label>
                        <input type="text" id="name" name="name" class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                        </div>
                    </div>
                    <div class="w-1/2 p-2">
                        <div class="relative">
                        <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <div class="relative">
                        <label for="message" class="text-sm leading-7 text-gray-600">Message</label>
                        <textarea id="message" name="message" class="h-32 w-full resize-none rounded border border-gray-300 bg-gray-100 bg-opacity-50 px-3 py-1 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200"></textarea>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <button class="mx-auto flex rounded border-0 bg-indigo-500 px-8 py-2 text-lg text-white hover:bg-indigo-600 focus:outline-none">Button</button>
                    </div>
                    <div class="mt-8 w-full border-t border-gray-200 p-2 pt-8 text-center">
                        @foreach ($users as $user)
                            @if ($user->name == Auth::user()->name)
                                <span>Your Email:</span>
                                <a class="text-indigo-500">{{ $user->email }}</a>
                            @endif
                        @endforeach
                    </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </section>
</x-guest-layout>
