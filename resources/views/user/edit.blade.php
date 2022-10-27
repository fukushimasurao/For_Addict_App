<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('症状日記') }}
            <button onclick="location.href='{{ route('diary.create') }}'"
                class="text-base ml-5 shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">新規作成</button>
        </h2>

    </x-slot> --}}
    {{-- @if (session('status'))
        <x-ui.flash-message message="{{ session('status') }}"></x-ui.flash-message>
    @endif --}}

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="py-5 bg-blueGray-50">
                        <div class="mt-10 sm:mt-0">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg text-center font-medium leading-6 text-gray-900">マイページ（編集）</h3>
                            </div>
                            {{-- <div class="md:grid md:grid-cols-3 md:gap-6"> --}}
                            <div class="md:flex md:justify-center">
                                <div class="mt-5 md:col-span-2 md:mt-0">
                                    <form action="{{ route('user.update', ['id' => Auth::user()->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        {{-- <input type="hidden" name="id" value="{{ Auth::user()->name }}"> --}}
                                        <div class="overflow-hidden shadow sm:rounded-md">
                                            <div class="bg-white px-4 py-5 sm:p-6">
                                                <div class="grid grid-cols-6 gap-6">
                                                    <div class="col-span-6 sm:col-span-3">
                                                        <label for="first-name"
                                                            class="block text-sm font-medium text-gray-700">新しいニックネーム
                                                        </label>
                                                        <input type="text" name="name" id="first-name"
                                                            value="{{ old('name', Auth::user()->name) }}"
                                                            autocomplete="name"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        @error('name')
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
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label for="email"
                                                            class="block text-sm font-medium text-gray-700">新しいメールアドレス
                                                        </label>

                                                        <input type="text" name="email" id="email"
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
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label for="password"
                                                            class="block text-sm font-medium text-gray-700">新しいパスワード(8文字以上、大文字小文字の半角英数)
                                                        </label>
                                                        <input type="password" name="password" id="password"
                                                            autocomplete="password"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                                                        @error('password')
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
                                                    <div class="col-span-6 sm:col-span-4">
                                                        <label for="password_confirmation"
                                                            class="block text-sm font-medium text-gray-700">新しいパスワード(確認用)
                                                        </label>
                                                        <input type="password" name="password_confirmation"
                                                            id="password_confirmation"
                                                            autocomplete="password_confirmation"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                                                        @error('password_confirmation')
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
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                                <button type="submit"
                                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">変更する</button>
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
