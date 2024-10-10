@extends('layouts.app')

@section('title', 'Modifica Autore')

@section('content')
    <section class="row">
        <div class="col-md-12 my-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
            </div>
            <h2 class="mt-5 mb-4">Modifica Autore</h2>
        </div>
        <div class="col-md-5">
            <form action="{{ route('authors.update', $author->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" placeholder="Umberto Eco" required>
                    <label for="name">Nome e Cognome</label>
                </div>
                <div class="mb-3 form-floating birthday_width">
                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $author->birthday }}" placeholder="Umberto Eco">
                    <label for="birthday">Data di Nascita (opzionale)</label>
                </div>
                <div class="pt-4 border-top">
                    <button type="submit" class="btn btn-primary me-3">Aggiorna Autore</button>
                    <a href="{{ route('authors.index') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                </div>
            </form>
        </div>
    </section>
@endsection