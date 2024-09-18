<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 px-6 py-8 bg-amber-100">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            Posts
                        </h1>
                        <post-filter></post-filter>
                    </div>
                    @foreach ($posts as $post)
                        <div class="mt-6">
                            <x-post :post="$post" />
                        </div>
                    @endforeach
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Author
                        </h1>
                        <div
                            class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md"
                        >
                            <div class="flex flex-col items-center"> 
                                <a class="flex flex-col items-center" href="{{ route("profile.show", $author->id) }}"> 
                                    <img
                                        class="object-cover w-20 h-20 mb-4 rounded-full" 
                                        src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $author->name }}"
                                        alt="avatar"
                                    />

                                    <h1
                                        class="font-bold text-gray-700 hover:underline"
                                    >
                                        {{ $author->name }}
                                    </h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Categories
                        </h1>
                        @foreach ($categories as $category)
                            <x-category
                                :category="$category"
                                :count="$category->user_posts_count"
                            />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
