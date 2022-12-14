<x-app-layout>
    @if ($errors)
        @foreach ($errors->all() as $error)
            <x-ui.flash-error-message message="{{ $error }}"></x-ui.flash-error-message>
        @endforeach
    @endif
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <x-ui.flash-message message="{{ session('status') }}"></x-ui.flash-message>
                    @endif
                    <section class="py-5 bg-blueGray-50">
                        <div class="mt-10 sm:mt-0">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg text-center font-medium leading-6 text-gray-900">マイページ</h3>
                            </div>
                            <div class="md:flex md:justify-center">
                                <div class="mt-5 md:col-span-2 md:mt-0">

                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="bg-white px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first-name"
                                                        class="block text-sm font-medium text-gray-700">ニックネーム
                                                    </label>
                                                    <p class="block text-xl font-medium text-gray-700">
                                                        {{ Auth::user()->name }}</p>
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="email-address"
                                                        class="block text-sm font-medium text-gray-700">メールアドレス
                                                    </label>
                                                    <p class="block text-xl font-medium text-gray-700">
                                                        {{ Auth::user()->email }}</p>
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="email-address"
                                                        class="block text-sm font-medium text-gray-700">パスワード
                                                    </label>
                                                    <p class="block text-xl font-medium text-gray-700">******</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-around">
                                            <div class="px-4 py-3 text-center sm:px-6">
                                                <button onclick="location.href='{{ route('diary') }}'"
                                                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">戻る</button>
                                            </div>
                                            <div class="px-4 py-3 text-center sm:px-6">
                                                <form action="{{ route('user.edit_select') }}" method="GET">
                                                    <button type="submit"
                                                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">変更する</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
