<x-app-layout>

    <div class="px-6 py-8 bg-amber-100">
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
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                    @foreach ($authors as $author)
                        <div>{{ $author->name }}</div>
                        <x-user :user="$author"/>
                    @endforeach
                </div>
                <div class="mt-10 px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                    @foreach ($categories as $category)
                        <div>{{ $category->name }}</div>
                    @endforeach
                </div>
                <div class="mt-10 px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                    <recent-post></recent-post>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

