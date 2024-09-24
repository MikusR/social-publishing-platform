<div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between">
        <span title="{{$post->created_at}}"
              class="font-light text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
        <span>
            @if($post->comments_count >= 1)
                has {{$post->comments_count}} comments
            @endif

        </span>
        <span>
        @if (count($post->categories) >= 1)
                @foreach($post->categories as $category)
                    <a class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500"
                       href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                @endforeach

            @else
                <a class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500"
                   href="{{ route('category.show-uncategorized') }}">Uncategorized</a>
            @endif
        </span>
    </div>
    <div class="mt-2">
        <a class="text-2xl font-bold text-gray-700 hover:underline"
           href="
           {{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
        <div class="mt-2 prose text-gray-600">@markdown( $post->excerpt )</div>
    </div>
    <div class="flex items-center justify-between mt-4">
        <a class="text-blue-500 hover:underline" href="{{ route('posts.show', $post->id) }}">Read more</a>
        <div>
            <a class="flex items-center" href="{{ route('profile.show', $post->user->id) }}">
                <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                     src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $post->user->name }}"
                     alt="avatar">
                <h1 class="font-bold text-gray-700 hover:underline">{{ $post->user->name }}</h1>
            </a>
        </div>
    </div>
    @if ($post->user_id == auth()->id())
        <div class="flex mt-4 items-center justify-between">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-danger-button class="mt-4">Delete Post</x-danger-button>
            </form>

            <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                @csrf
                @method('GET')
                <x-primary-button class="mt-4">Edit Post</x-primary-button>
            </form>
        </div>
    @endif
</div>
