<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('症状の記録') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                    id</th>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                    user id</th>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                    記録日</th>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                    症状発生時間</th>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-xs bg-gray-100">
                                    症状が続いた時間（分）</th>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                    その時の気分感情</th>
                                <th
                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                    症状への対処法・反省点</th>
                                <th
                                    class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($diaries as $diary)
                                <tr>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $diary->id }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $diary->user_id }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">
                                        {{ Carbon\Carbon::parse($diary->date)->format('Y年n月j日') }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $diary->time }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">{{ $diary->elapsed_time }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">
                                        {{ Str::limit($diary->feeling, 20, '...') }}</td>
                                    <td class="border-t-2 border-gray-200 px-4 py-3">
                                        {{ Str::limit($diary->coping_measures, 20, '...') }}</td>

                                    <td class="border-t-2 border-gray-200 px-4 py-3"> <button
                                            onclick="location.href='/book/detail/{{ $diary->id }}'"
                                            class="text-sm shadow bg-gray-500 hover:bg-gray-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">詳細</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $diaries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
