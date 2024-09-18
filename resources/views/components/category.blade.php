<li class="flex items-center">
    <p>
        <a
            class="mx-1 font-bold text-gray-700 hover:underline"
            href="{{ route("categories.show", $category) }}"
        >
            {{ $category->name }}
        </a>
        <span class="text-sm font-light text-gray-700">({{ $count }})</span>
    </p>
</li>
