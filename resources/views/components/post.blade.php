<div class="bg-blue-200 mb-4 mt-3 m-4">


    @foreach($post->categories as $category)
        <a class="bg-cyan-100"
           href="#">#{{  $category->name }}</a>

    @endforeach

    <div class="bg-emerald-200 m-4">
        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
        <p class="bg-fuchsia-200">{{ $post->body }}</p>
    </div>

    <div class="bg-rose-200">
        <a href="#">
            {{ $post->user->name }}

        </a>
    </div>

</div>
