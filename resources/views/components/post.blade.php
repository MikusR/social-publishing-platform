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
        <a class="text-2xl text-gray-700 font-bold hover:underline" href="#">{{ $post->title }}</a>
        <div class="mt-2 text-gray-600 prose">@markdown( $post->body )</div>
    </div>
    <div class="flex justify-between items-center mt-4">
        <a class="text-blue-500 hover:underline" href="#">Read more</a>
        <div>
            <a class="flex items-center" href="#">
                
                <h1 class="text-gray-700 font-bold hover:underline">{{ $post->user->name }}</h1>
            </a>
        </div>
    </div>
</div>
