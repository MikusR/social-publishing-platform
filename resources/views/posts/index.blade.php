<x-app-layout>

    <div class="bg-amber-100 ">

        @foreach ($posts as $post)
            <x-post :post="$post"/>
        @endforeach


    </div>
</x-app-layout>
