<x-app-layout>
    <div class="flex justify-center">
        <div class="w-9/12 px-6 py-8 bg-amber-100">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            Edit Comment
                        </h1>

                    </div>

                    <div class="mt-6">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                            @csrf
                            @method('PATCH')
                            <x-text-input id="body" name="body" type="text" class="block w-full mb-4"
                                          :value="old('body', $comment->body)" required placeholder="Edit comment"
                                          autofocus />
                            <x-input-error :messages="$errors->get('body')" class="mt-2" />
                           

                            <x-primary-button class="mt-4">
                                {{ __('Update comment') }}
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
                                     src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $comment->user->name }}"
                                     alt="avatar" />

                                <h1 class="font-bold text-gray-700">
                                    {{ $comment->user->name }}
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
