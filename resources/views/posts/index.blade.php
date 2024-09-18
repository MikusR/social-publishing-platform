<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 bg-amber-100 px-6 py-8">
            <div class="container mx-auto flex justify-between">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            {{ $title }}
                        </h1>
                        <post-filter></post-filter>
                    </div>
                    @foreach ($posts as $post)
                        <div class="mt-6">
                            <x-post :post="$post" />
                        </div>
                    @endforeach

                    <div class="mt-8">
                        <Pagination></Pagination>
                    </div>
                </div>
                <div class="-mx-8 hidden w-4/12 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Authors
                        </h1>
                        <div
                            class="mx-auto flex max-w-sm flex-col rounded-lg bg-white px-6 py-4 shadow-md"
                        >
                            <ul class="-mx-4">
                                @foreach ($authors as $author)
                                    <x-user :author="$author" />
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="mt-10 px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Categories
                        </h1>
                        @foreach ($categories as $category)
                            <x-category
                                :category="$category"
                                :count="$category->posts_count"
                            />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
