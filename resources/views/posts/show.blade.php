<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

    </div>
    <div class="flex justify-center ">
        <div class="px-6 py-8 bg-amber-100  w-9/12">
            <div class="flex justify-between container mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">{{ $post->title }}</h1>
                        <post-filter></post-filter>
                    </div>

                    <div class="mt-6">
                        <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                            <div class="flex justify-between items-center">
                                <span class="font-light text-gray-600">{{ $post->created_at }}</span>
                                <span>
        @if (count($post->categories) >= 1)
                                        @foreach($post->categories as $category)
                                            <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                                               href="#">{{ $category->name }}</a>
                                        @endforeach

                                    @else
                                        <a class="px-2 py-1 bg-gray-600 text-gray-100 font-bold rounded hover:bg-gray-500"
                                           href="#">Uncategorized</a>
                                    @endif
        </span>
                            </div>
                            <div class="mt-2">
                                <a class="text-2xl text-gray-700 font-bold hover:underline"
                                   href="#">{{ $post->title }}</a>
                                <div class="mt-2 text-gray-600 prose">@markdown( $post->body )</div>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="-mx-8 w-4/12 hidden lg:block">
                    <div class="px-8">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Author</h1>
                        <div class="flex flex-col bg-white max-w-sm px-6 py-4 mx-auto rounded-lg shadow-md">
                            <ul class="-mx-4">
                                <a href="{{ route('profile.index', $post->user->id) }}">
                                {{  $post->user->name }}
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
