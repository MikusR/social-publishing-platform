<li class="flex items-center">
    <a class="flex items-center" href="{{ route('profile.show', $author->id) }}">
        <img class="w-10 h-10 object-cover rounded-full mx-4"
             src="https://api.dicebear.com/9.x/bottts/svg?size=32&radius=50&seed={{ $author->name }}"
             alt="avatar">
        <p>
        <div class="text-gray-700 font-bold mx-1 hover:underline">{{ $author->name }}</div>
        <span class="text-gray-700 text-sm font-light">({{ $author->posts_count }})</span>
        </p>
    </a>
</li>

