<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('症状日記') }}
            <button onclick="location.href='{{ route('diary.create') }}'"
                class="text-base ml-5 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">新規作成</button>
        </h2>
    </x-slot>
    @if (session('status'))
        <x-ui.flash-message message="{{ session('status') }}"></x-ui.flash-message>
    @endif

    <div class="py-3 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-5 py-4 mx-auto">
                            <div class="flex flex-wrap -m-4 @if (count($diaries) === 0) justify-around @endif">
                                @if (count($diaries) === 0)
                                    <div class="flex p-4 my-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <span>記録がありません😰</span>
                                        </div>
                                    </div>
                                @endif

                                @foreach ($diaries as $diary)
                                    <div class="p-4 xl:w-1/4 md:w-1/2 w-full cursor-pointer "s
                                        onclick="location.href='/diary/detail/{{ $diary->uuid }}'">
                                        <div
                                            class="h-full p-6 rounded-lg border-2 border-indigo-500 flex flex-col relative overflow-hidden hover:bg-indigo-100">
                                            <span
                                                class="bg-indigo-500 text-white px-3 py-1 tracking-widest text-xs absolute right-0 top-0 rounded-bl">
                                                {{ App\Models\Diary::DIARY_STATUS_OBJECT[$diary->importance] }}
                                            </span>
                                            <h2 class="text-sm tracking-widest title-font mb-1 font-medium">
                                                {{ Carbon\Carbon::parse($diary->date)->format('Y年n月j日') }} /
                                                {{ Carbon\Carbon::parse($diary->time)->format('H:i') }}</h2>
                                            <h1
                                                class="text-lg text-gray-900 leading-none flex items-center pb-4 mb-4 border-b border-gray-200">
                                                {{ Str::limit($diary->coping_measures, 20, '...') }}</h1>
                                            <p class="flex items-center text-gray-600 mb-2">
                                                <span
                                                    class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3"
                                                        viewBox="0 0 24 24">
                                                        <path d="M20 6L9 17l-5-5"></path>
                                                    </svg>
                                                </span>{{ $diary->elapsed_time }}分間
                                            </p>
                                            <p class="flex items-center text-gray-600 mb-6">
                                                <span
                                                    class="w-4 h-4 mr-2 inline-flex items-center justify-center bg-gray-400 text-white rounded-full flex-shrink-0">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2.5" class="w-3 h-3"
                                                        viewBox="0 0 24 24">
                                                        <path d="M20 6L9 17l-5-5"></path>
                                                    </svg>
                                                </span>{{ Str::limit($diary->feeling, 20, '...') }}
                                            </p>
                                            {{-- <button onclick="location.href='/diary/detail/{{ $diary->uuid }}'"
                                                class="flex items-center mt-auto text-white bg-indigo-500 border-0 py-2 px-4 w-full focus:outline-none hover:bg-indigo-600 rounded">詳細
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto"
                                                    viewBox="0 0 24 24">
                                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                </svg>
                                            </button> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    </a>
                    {{ $diaries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
