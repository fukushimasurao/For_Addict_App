<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">

                    <section class="text-gray-600 body-font mb-5">
                        <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                                <h1 class="sm:text-5xl text-2xl font-medium title-font mb-2 text-gray-900">Record Your
                                    Impulses.</h1>
                                <p class="leading-relaxed text-base">
                                    症状日記は、あなたの衝動を記録するためのツールです。少しでも依存への衝動を感じたら、すぐに記録しましょう。そして、定期的に見直しましょう。</p>
                            </div>
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                                <img class="object-cover object-center rounded" alt="hero"
                                    src="{{ asset('storage/images/top/team.png') }}">
                            </div>
                        </div>
                    </section>

                    <section class="text-gray-600 body-font mb-5">
                        <div class="container px-5 py-5 mx-auto">
                            <div class="text-center mb-20">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">For All
                                    Addictions.</h1>
                                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                                    どんな依存でも記録することで、その行動を簡単に見直すことができます。</p>
                                <div class="flex mt-6 justify-center">
                                    <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                                </div>
                            </div>
                            <div
                                class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6 justify-center flex-col md:flex-row">

                                <div class="p-4 flex flex-col text-center items-center">
                                    <div
                                        class="w-20 h-20 inline-flex items-center justify-center rounded-full  text-indigo-500 mb-5 flex-shrink-0">

                                        <img class="object-cover object-center rounded" alt="beer"
                                            src="{{ asset('storage/images/top/beer.png') }}">

                                    </div>
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">アルコール依存
                                        </h2>
                                    </div>
                                </div>

                                <div class="p-4  flex flex-col text-center items-center">
                                    <div
                                        class="w-20 h-20 inline-flex items-center justify-center rounded-full  text-indigo-500 mb-5 flex-shrink-0">
                                        <img class="object-cover object-center rounded" alt="smoke"
                                            src="{{ asset('storage/images/top/smoke.png') }}">
                                    </div>
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">タバコ依存
                                        </h2>
                                    </div>
                                </div>

                                <div class="p-4  flex flex-col text-center items-center">
                                    <div
                                        class="w-20 h-20 inline-flex items-center justify-center rounded-full  text-indigo-500 mb-5 flex-shrink-0">
                                        <img class="object-cover object-center rounded" alt="shopping"
                                            src="{{ asset('storage/images/top/shopping.png') }}">
                                    </div>
                                    <div class="flex-grow">
                                        <h2 class="text-gray-900 text-lg title-font font-medium mb-3">買い物依存
                                        </h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-5 mx-auto">
                            <div class="flex justify-center -mx-4 -mb-10 text-center">
                                <div class="sm:w-1/2 mb-10 px-4">
                                    <div
                                        class="w-30 h-30 inline-flex items-center justify-center rounded-full  text-indigo-500 mb-5 flex-shrink-0">

                                        <img class="object-cover object-center rounded" alt="beer"
                                            src="{{ asset('storage/images/top/ouen.png') }}">

                                    </div>
                                    <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Join Us!
                                    </h2>
                                    <p class="leading-relaxed text-base">みんなで一緒に解決していきましょう！</p>
                                    <button onclick="location.href='{{ route('login') }}'"
                                        class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded">一緒に頑張る！</button>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
