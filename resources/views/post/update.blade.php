<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
        </a>
    </x-slot>

    <div>
        {{ \Illuminate\Support\Facades\Session::get('success') }}
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="/posts/{{ $post->id }}}" enctype="multipart/form-data" style="margin: 100px">
        @csrf
        @method('PATCH')

        <div class="mt-4">
            <x-label for="name" value="Название"/>

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $post->name)"
                     required/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <img src="{{ $image }}" alt="image" width="200px">
            <x-label for="image" value="Картинка"/>

            <x-input id="password" class="block mt-1 w-full"
                     type="file" name="image"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="category" value="Категория"/>

            <select id="category" class="block mt-1 w-full" name="category_id" required>
                @foreach($categories as $category)
                    <option
                        value="{{ $category['id'] }}" {{ $post->category_id === $category['id'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                Обновить запись
            </x-button>
        </div>
    </form>
</x-app-layout>
