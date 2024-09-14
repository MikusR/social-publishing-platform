<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <x-input-label for="title" :value="__('Post title')"/>

            <x-text-input id="title" name="title" type="text" class="block w-full" :value="old('title')" required
                          autofocus/>

            <textarea
                name="body"
                placeholder="{{ __('Post body') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('body') }}</textarea>
            <x-input-error :messages="$errors->get('body')" class="mt-2"/>
            <x-input-label for="category" :value="__('Category')"></x-input-label>
            <select name="category" id="category" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
