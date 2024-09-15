<x-app-layout>
    <div class="flex justify-center ">
        <div class="px-6 py-8 bg-amber-100  w-9/12">
            <div class="flex justify-between container mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Posts</h1>
                        <post-filter></post-filter>
                    </div>
                    @foreach ($posts as $post)
                        <div class="mt-6">
                            <x-post :post="$post"/>
                        </div>
                    @endforeach


                    <div class="mt-8">
                        <Pagination></Pagination>
                    </div>
                </div>
                <div class="-mx-8 w-4/12 hidden lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Author</h1>
                        <div class="flex flex-col bg-white max-w-sm px-6 py-4 mx-auto rounded-lg shadow-md">
                            <ul class="-mx-4">
                                {{  $author->name }}
                                <span
                                    class="text-gray-700 text-sm font-light">Created {{ $author->posts_count }} posts</span>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-10 px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        @foreach ($categories as $category)
                            <x-category :category="$category"
                                        :count="$category->getUserPostsCountAttribute($author->id)"/>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

