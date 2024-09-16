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
                            <x-post :post="$post" />
                        </div>
                    @endforeach

                </div>
                <div class="-mx-8 w-4/12 hidden lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Author</h1>
                        <div
                            class="mx-auto flex max-w-sm flex-col rounded-lg bg-white px-6 py-4 shadow-md"
                        >
                            <div class="justify-left -mx-4 flex items-center">
                                <a
                                    class=""
                                    href="{{ route("profile.show", $post->user->id) }}"
                                >
                                    <img
                                        class="mx-4 hidden h-20 w-20 rounded-full object-cover sm:block"
                                        src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $post->user->name }}"
                                        alt="avatar"
                                    />

                                    <h1
                                        class="font-bold text-gray-700 hover:underline"
                                    >
                                        {{ $post->user->name }}
                                    </h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        @foreach ($categories as $category)
                            <x-category :category="$category"
                                        :count="$category->user_posts_count" />
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

