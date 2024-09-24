<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 bg-amber-100 px-6 py-8">
            <div class="container mx-auto flex justify-between">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            Create new post
                        </h1>
                        <post-filter></post-filter>
                    </div>

                    <div class="mt-6">
                        <form method="POST" action="{{ route("posts.store") }}">
                            @csrf
                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                class="mb-4 block w-full"
                                :value="old('title')"
                                required
                                placeholder="Enter Post Title"
                                autofocus
                            />

                            <textarea
                                required
                                rows="10"
                                name="body"
                                placeholder="{{ __("Post body. You can use Markdown") }}"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
{{ old("body") }}</textarea
                            >
                            <x-input-error
                                :messages="$errors->get('body')"
                                class="mt-2"
                            />
                            <x-input-label
                                for="categories"
                                :value="__('Categories')"
                            ></x-input-label>

                            @foreach ($categories as $category)
                                <input
                                    type="checkbox"
                                    id="check_{{ $category->name }}"
                                    name="categories[]"
                                    value="{{ $category->id }}"
                                />
                                <label for="check_{{ $category->name }}">{{ $category->name }}</label>

                                <br />
                            @endforeach

                            <x-primary-button class="mt-4">
                                {{ __("Post") }}
                            </x-primary-button>
                        </form>
                    </div>

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

                                <img
                                    class="mb-4 h-20 w-20 rounded-full object-cover"
                                    src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $author->name }}"
                                    alt="avatar"
                                />

                                <h1
                                    class="font-bold text-gray-700 "
                                >
                                    {{ $author->name }}
                                </h1>

                            </div>
                        </div>
                    </div>
                    <div class="mt-10 px-8">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
