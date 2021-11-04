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

    <br>
    <br>
    <div>
        {{ \Illuminate\Support\Facades\Session::get('success') }}
    </div>
    <br>
    <br>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="/employees" style="margin: 100px">
        @csrf

        <div class="mt-4">
            <x-label for="email" value="Почта"/>

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
        </div>

        <div class="mt-4">
            <x-label for="password" value="Пароль"/>

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')"
                     required/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                Создать сотрудника
            </x-button>
        </div>
    </form>
</x-app-layout>
