@extends('layouts.app')
@section('content')
    <header>
        <h1 class="text-center">Crea un nuovo post</h1>
    </header>
    <main class="container">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" placeholder="title" name="title" required
                    value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="url "> URL del image: </label>
                <input type="url" name="image" class="form-control" id="url" placeholder="URL del comic"
                    value="{{ old('image') }}">
            </div>
            <div class="form-group">
                <label for="contenut">contenuto</label>
                <textarea class="form-control" id="contenut" rows="3" name="content" required>{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option>Nessuna Categoria</option>
                    @foreach ($categories as $category)
                        <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                            {{ $category->label }}</option>
                    @endforeach
                </select>
            </div>
            @if (count($tags))
                <fieldset>
                    <h4>Tags</h4>
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{ $tag->label }}" name="tags[]"
                                value="{{ $tag->id }}" {{-- facciamo l'if cosi quando ricarichiamo la pagina non perdo i checkbox selezionati
                                e mettiamo dentro l'old un secondo parametro cosi la pagina non mi dà errore quando acceddo e ooviamente non ho ancora selzionato nulla --}}
                                @if (in_array($tag->id, old('tags', []))) checked @endif>
                            <label class="form-check-label" for="{{ $tag->label }}">{{ $tag->label }}</label>
                        </div>
                    @endforeach
                </fieldset>
            @endif
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Salva</button>
            </div>
        </form>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary mr-4 mt-2">Torna indietro</a>
    </main>
@endsection
