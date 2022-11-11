<x-app-layout>
    @if (session('status'))
        <x-ui.flash-message message="{{ session('status') }}"></x-ui.flash-message>
    @endif
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <section class="bg-blueGray-50">
                        <div class="mt-10 sm:mt-0">
                            <div class="px-3 py-3">
                                <h3 class="text-lg text-center font-medium leading-6 text-gray-900">マイページ（メールアドレス編集）</h3>
                            </div>
                            {{-- <div class="md:grid md:grid-cols-3 md:gap-6"> --}}
                            <div class="md:flex md:justify-center">
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                    <form action="{{ route('user.email_update', ['id' => Auth::user()->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        {{-- <input type="hidden" email="id" value="{{ Auth::user()->email }}"> --}}
                                        <div class="overflow-hidden shadow sm:rounded-md">
                                            <div class="bg-white px-3 py-3">
                                                <div class="grid grid-cols-6 gap-6 mb-5">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="first-email"
                                                            class="block text-sm font-medium text-gray-700">新しいメールアドレス
                                                        </label>
                                                        <input type="text" name="email" id="first-email"
                                                            value="{{ old('email', Auth::user()->email) }}"
                                                            autocomplete="email"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        @error('email')
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
                                                                    <span>{{ $message }}</span>
                                                                </div>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-6 gap-6 mb-5">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="first-email"
                                                            class="block text-sm font-medium text-gray-700">新しいメールアドレス（確認用）
                                                        </label>
                                                        <input type="text" name="email_confirmation" id="first-email"
                                                            value="{{ old('email', Auth::user()->email) }}"
                                                            autocomplete="email"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                                <h1 class="text-red-600 text-sm">
                                                    ※確認用のメールが送信されます。<br />受信したメールは必ず確認してください。
                                                </h1>
                                            </div>
                                            <div class="flex justify-around">
                                                <div class="px-4 py-3 text-center sm:px-6">
                                                    <span onclick="location.href='{{ route('user.my_page') }}'"
                                                        class="cursor-pointer inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">戻る</span>
                                                </div>
                                                <div class="px-4 py-3 text-right sm:px-6">
                                                    <button type="submit"
                                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">変更する</button>
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
