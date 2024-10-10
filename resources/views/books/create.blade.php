@extends('layouts.app')

@section('title', 'Aggiungi un Libro')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
                </div>
                <h2 class="mt-5 mb-4">Aggiungi un Libro</h2>
            </div>
            <div class="col-md-5">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Il nome della Rosa" required>
                        <label for="title">Titolo</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control textarea-height" placeholder="Inserisci la descrizione" id="description" name="description"></textarea>
                        <label for="description">Descrizione (opzionale)</label>
                    </div>
                    <div class="mb-3 form-floating nr_pages_width">
                        <input type="number" class="form-control" id="pages" name="pages" placeholder="10">
                        <label for="pages">N° Pagine (opzionale)</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select class="form-select" aria-label="Seleziona l'Autore" id="author" name="author_id" required>
                            <option selected>Seleziona l'Autore</option>
                            @foreach($autori as $autore)
                                <option value="{{ $autore->id }}">{{ $autore->name }}</option>
                            @endforeach
                        </select>
                        <label for="author">Autore</label>
                    </div>
                    <div class="mb-4 form-floating">
                        <select class="form-select" aria-label="Seleziona la Categoria" id="category" name="category_id" required>
                            <option selected>Seleziona la Categoria</option>
                            @foreach($categorie as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                        <label for="category">Categoria</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="file" class="form-control" id="cover_image" name="cover_image" placeholder="Copertina Libro" accept="image/*">
                        <label for="cover_image">Copertina del Libro (opzionale)</label>
                        <small class="form-text text-muted">Formato accettato: jpeg, png, jpg, gif. Max 2MB.</small>
                    </div>
                    <div class="pt-4 border-top">
                        <button type="submit" class="btn btn-primary me-3">Aggiungi il Libro</button>
                        <a href="{{ route('books.index') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection