<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">

                    <section class="bg-blueGray-50">
                        <div class="">
                            <div class="px-3 py-3">
                                <h3 class="text-lg text-center font-medium leading-6 text-gray-900">マイページ（編集選択）</h3>
                            </div>
                            <div class="flex flex-col items-center">

                                <form action="{{ route('user.edit_name') }}" method="get">
                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">ニックネーム変更</button>
                                    </div>
                                </form>

                                <form action="{{ route('user.edit_email') }}" method="get">
                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">メールアドレス変更</button>
                                    </div>
                                </form>

                                <form action="{{ route('user.edit_password') }}" method="get">
                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">パスワード変更</button>
                                    </div>
                                </form>

                                <div class="mb-10"></div>

                                <form action="{{ route('user.confirm_destroy') }}" method="get">
                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">退会する</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
