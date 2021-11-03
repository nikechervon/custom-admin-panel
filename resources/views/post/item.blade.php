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

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <div style="margin: 100px">
        <div style="display: flex; justify-content: center;">
            <h3 style="margin-right: 30px" class="h3">ID:</h3>
            <p style="color: red; font-weight: bold; font-size: 20px">{{ $post->id }}</p>
        </div>
        <div style="display: flex; justify-content: center;">
            <h3 style="margin-right: 30px" class="h3">Название:</h3>
            <p style="color: red; font-weight: bold; font-size: 20px">{{ $post->name }}</p>
        </div>
        <div style="display: flex; justify-content: center;">
            <h3 style="margin-right: 30px" class="h3">Картинка:</h3>
            <img src="{{ $image }}" alt="image" width="200">
        </div>
        <div style="display: flex; justify-content: center;">
            <h3 style="margin-right: 30px" class="h3">Категория:</h3>
            <p style="color: red; font-weight: bold; font-size: 20px">{{ $post->category->name }}</p>
        </div>
        <div style="display: flex; justify-content: center;">
            <h3 style="margin-right: 30px" class="h3">Автор:</h3>
            <p style="color: red; font-weight: bold; font-size: 20px">{{ $post->user->email }}</p>
        </div>
    </div>

</x-app-layout>
