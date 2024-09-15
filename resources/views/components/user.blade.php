<li class="flex items-center">
    <p>
        <a class="text-gray-700 font-bold mx-1 hover:underline"
           href="{{ route('profile.show', $author->id) }}">{{ $author->name }}</a>
        <span class="text-gray-700 text-sm font-light">Created {{ $author->posts_count }} posts</span>
    </p>
</li>

