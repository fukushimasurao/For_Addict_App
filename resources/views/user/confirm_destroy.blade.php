<x-app-layout>
    @if (session('status'))
        <x-ui.flash-message message="{{ session('status') }}"></x-ui.flash-message>
    @endif
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="py-5 bg-blueGray-50">
                        <div class="mt-10 sm:mt-0">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg text-center font-medium leading-6 text-gray-900 mb-3">ユーザー削除</h3>
                            </div>
                            <p class="text-lg text-center font-medium leading-6 text-gray-900 mb-3">
                                一度削除すると、今まで保存したデータは復元できません。<br />本当に削除しますか？</p>
                            <div class="md:flex md:justify-center">
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                    <form action="{{ route('user.destroy', ['uuid' => Auth::user()->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="overflow-hidden shadow sm:rounded-md">
                                            <div class="bg-white px-4 py-5 sm:p-6">
                                                <div class="flex">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="password"
                                                            class="block text-sm font-medium text-gray-700">削除する場合は、下記にパスワードを記入して送信してください。
                                                        </label>
                                                        <input type="password" name="password" id="password"
                                                            autocomplete="password"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                                                        @if ($errors)
                                                            @foreach ($errors->all() as $error)
                                                                <div class="flex p-4 my-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                                                    role="alert">
                                                                    <svg aria-hidden="true"
                                                                        class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <div>
                                                                        <span>{{ $error }}</span>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        @endif

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="flex justify-around">
                                                <div class="px-4 py-3 text-center sm:px-6">
                                                    <span onclick="location.href='{{ route('user.my_page') }}'"
                                                        class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">戻る</span>
                                                </div>
                                                <div class="px-4 py-3 text-right sm:px-6">
                                                    <button type="submit"
                                                        class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">削除する</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
