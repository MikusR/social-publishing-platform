<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 px-6 py-8 bg-amber-100">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            Edit post
                        </h1>

                    </div>

                    <div class="mt-6">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            @method('PATCH')
                            <x-text-input id="title" name="title" type="text" class="block w-full mb-4"
                                          :value="old('title', $post->title)" required placeholder="Enter Post Title"
                                          autofocus />

                            <textarea required rows="10" name="body"
                                      placeholder="{{ __('Post body. You can use Markdown') }}"
                                      class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('body', $post->body) }}</textarea>
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                            <x-input-label for="categories" :value="__('Categories')"></x-input-label>

                            @foreach ($categories as $category)
                                <input type="checkbox" id="check_{{ $category->name }}" name="categories[]"
                                       value="{{ $category->id }}"
                                       @if (in_array($category->id, $post->categories->pluck('id')->toArray())) checked @endif />
                                <label for="check_{{ $category->name }}">
                                    {{ $category->name }}
                                </label>

                                <br />
                            @endforeach

                            <x-primary-button class="mt-4">
                                {{ __('Update post') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">
                            Author
                        </h1>
                        <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex flex-col items-center">
                                <img class="object-cover w-20 h-20 mb-4 rounded-full"
                                     src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $author->name }}"
                                     alt="avatar" />

                                <h1 class="font-bold text-gray-700">
                                    {{ $author->name }}
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 mt-10"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
