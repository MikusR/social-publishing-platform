<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 bg-amber-100 px-6 py-8">
            <div class="container mx-auto flex justify-between">
                <div class="w-full lg:w-8/12">
                    <div class="mt-6">
                        <div
                            class="max-w-4xl rounded-lg bg-white px-10 py-6 shadow-md"
                        >
                            <div class="flex items-center justify-between">
                                <span title="{{$post->created_at}}" class="font-light text-gray-600">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                                <span>
        @if (count($post->categories) >= 1)
                                        @foreach($post->categories as $category)
                                            <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                                               href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                                        @endforeach

                                    @else
                                        <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                                           href="{{ route('category.show-uncategorized') }}">Uncategorized</a>
                                    @endif
        </span>
                            </div>
                            <div class="mt-2">
                                <a
                                    class="text-2xl font-bold text-gray-700 hover:underline"
                                    href="{{ url()->previous() }}"
                                >
                                    {{ $post->title }}
                                </a>
                                <div class="prose mt-2 text-gray-600">
                                    @markdown($post->body)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            Comments
                        </h1>
                    </div>
                    <form method="POST" action="{{ route("comments.store", $post->id) }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="mt-6">
                            <x-text-input
                                id="body"
                                name="body"
                                type="text"
                                class="block w-full"
                                placeholder="Leave a comment"
                                required
                            />
                        </div>
                        <div class="mt-6">
                            <x-primary-button>
                                Submit
                            </x-primary-button>
                        </div>
                    </form>
                    @foreach ($post->comments->sortByDesc("created_at") as $comment)
                        <div class="mt-6">
                            <div
                                class="max-w-4xl rounded-lg bg-white px-10 py-6 shadow-md"
                            >
                                <div class="flex items-center justify-between">
                                    <span title="{{$post->created_at}}" class="font-light text-gray-600">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                    <span>
                                        <div>
                                            <a
                                                class="flex items-center"
                                                href="{{ route("profile.show", $comment->user->id) }}"
                                            >
                                                <img
                                                    class="hidden mx-4 h-10 w-10 rounded-full object-cover sm:block"
                                                    src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $comment->user->name }}"
                                                    alt="avatar"
                                                />
                                                <h1
                                                    class="font-bold text-gray-700 hover:underline"
                                                >
                                                    {{ $comment->user->name }}
                                                </h1>
                                            </a>
                                        </div>
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <div class="prose mt-2 text-gray-600">
                                        {{ $comment->body }}
                                    </div>
                                </div>
                            </div>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
