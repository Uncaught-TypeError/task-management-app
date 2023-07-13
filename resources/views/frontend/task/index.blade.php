<x-guest-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Tasks Avaliable Right Now</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Choose any task you feel like it</p>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($tasks as $task)
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg hover:scale-105 transition-transform cursor-pointer">
                        <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                        </div>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $task->title }}</h2>
                        <p class="leading-relaxed text-base">{{ $task->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Do Not Delete --}}
            {{-- <div class="flex flex-wrap -m-4">
                @foreach ($tasks as $task)
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                    <div class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </div>
                    <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $task->title }}</h2>
                    <p class="leading-relaxed text-base">{{ $task->description }}</p>
                    </div>
                </div>
                @endforeach
            </div> --}}
            @can('Take Task')
            <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"><a href="{{ route('task.index') }}">Take Tasks</a></button>
            @endcan
        </div>
    </section>
    <section>
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap w-full mb-12 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Contact Supervisors & Admins</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Need help in submitting tasks or taking them?</p>
            </div>
            <div class="flex items-center justify-center">
                <a href="{{ route('front.contact.index') }}" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Contact Us</a>
            </div>
        </div>
    </section>
</x-guest-layout>
