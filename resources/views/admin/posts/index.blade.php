@extends('layouts.app')
@section('content')
    {{-- conferma dell'eliminazione di un post --}}
    @if (session('delete'))
        <div class="green border rounded bg-white p-1 width-400">{{ session('delete') }}</div>
    @endif
    <header>
        <h1 class="text-center">Lista Posts</h1>
    </header>
    <table class="table mt-2 container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success mr-4">Crea Nuovo Post</a>
        </div>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Immagine</th>
                <th scope="col">Tags</th>
                <th scope="col">Categoria</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato</th>
                <th scope="col">Modificato</th>
                <th scope="col" class="text-center">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td> <img src="{{ $post->image }}" alt="" class="img-fluid"></td>
                    <td>
                        @forelse ($post->tags as $tag)
                            <span>{{ $tag->label }}</span>
                        @empty
                            Nessun Tag
                        @endforelse
                    </td>
                    <td>
                        {{-- in questo modo se non scelgo la categoria il codise non va in errore --}}
                        @if ($post->category)
                            {{ $post->category->label }}
                        @else
                            Nessuna
                        @endif
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>
                        {{-- in questo modo se non se l'autore è anonimo il codice non va in errore --}}
                        @if ($post->user)
                            {{ $post->user->name }}
                        @else
                            Anonimo
                        @endif
                    </td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary mr-4">Vedi</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mr-4">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" class="delete-form" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">
                        <h4 class="text-center">Nessun Post</h4>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
