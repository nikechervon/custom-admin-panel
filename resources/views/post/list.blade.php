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

    @if($posts->isEmpty())
        Записей не найдено!
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td><a href="/posts/{{ $post->id }}">{{ \Illuminate\Support\Str::limit($post->name) }}</a></td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="/posts/{{ $post->id }}/edit" style="color: blue">Редактировать</a>
                        <form action="/posts/{{ $post->id }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</x-app-layout>
