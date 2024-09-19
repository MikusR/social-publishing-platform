<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 bg-amber-100 px-6 py-8">
            <div class="container mx-auto flex justify-between">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            Posts
                        </h1>
                        @if(Session::has('success'))
                            <p class="bg-green-500 p-4 rounded-md text-white">{{ Session::get('success') }}</p>
                        @endif
                        @if(Session::has('error'))
                            <p class="bg-red-500 p-4 rounded-md text-white">{{ Session::get('error') }}</p>
                        @endif
                    </div>
                    @foreach ($posts as $post)
                        <div class="mt-6">
                            <x-post :post="$post" />
                        </div>
                    @endforeach
                </div>
                <div class="-mx-8 hidden w-4/12 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Author
                        </h1>
                        <div
                            class="mx-auto flex max-w-sm flex-col rounded-lg bg-white px-6 py-4 shadow-md"
                        >
                            <div class="flex flex-col items-center">
                                <a
                                    class="flex flex-col items-center"
                                    href="{{ route("profile.show", $author->id) }}"
                                >
                                    <img
                                        class="mb-4 h-20 w-20 rounded-full object-cover"
                                        src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $author->name }}"
                                        alt="avatar"
                                    />

                                    <h1
                                        class="font-bold text-gray-700 hover:underline"
                                    >
                                        {{ $author->name }}
                                    </h1>
                                    <h2>{{ $author->posts_count }} posts</h2>
                                    <h2>
                                        {{ $author->comments_count }} comments
                                    </h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Categories
                        </h1>
                        @foreach ($categories as $category)
                            <x-category
                                :category="$category"
                                :count="$category->user_posts_count"
                            />
                        @endforeach
                        <br />
                        <li class="flex items-center">
                            <p>
                                <a
                                    class="mx-1 font-bold text-gray-700 hover:underline"
                                    href="{{ route("category.show-uncategorized") }}"
                                >
                                    Uncategorized
                                </a>
                                <span class="text-sm font-light text-gray-700">({{ $uncategorizedCount }})</span>
                            </p>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
