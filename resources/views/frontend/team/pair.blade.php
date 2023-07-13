<x-guest-layout>
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-20 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">Teams & Pairs</h1>
                <p class="mx-auto text-base leading-relaxed lg:w-2/3">Teams that are working on projects together, each with specific team names</p>
            </div>
            <div class="-m-2 flex flex-wrap">
                <div class="w-full p-2 md:w-1/2 lg:w-1/3">
                    <div class="flex h-full items-center rounded-lg border border-gray-200 p-4">
                        <img alt="team" class="h-16 w-16 flex-shrink-0 rounded-full bg-gray-100 object-cover object-center" src="https://dummyimage.com/80x80" />
                        <div class="flex-grow ml-4">
                            <h2 class="title-font font-medium text-gray-900">{{ $text }}</h2>
                            <div class="flex flex-row items-center gap-1">
                                <p class="text-gray-500">{{ $senderName }}</p>
                                <p class="text-gray-500">|</p>
                                <p class="text-gray-500">{{ $recipientName }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
