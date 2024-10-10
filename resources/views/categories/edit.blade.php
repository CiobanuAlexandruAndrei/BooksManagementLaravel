@extends('layouts.app')

@section('title', 'Modifica Categoria')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
                </div>
                <h2 class="mt-5 mb-4">Modifica Categoria</h2>
            </div>
            <div class="col-md-5">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Romanzo, Saggio..." required>
                        <label for="name">Nome della Categoria</label>
                    </div>
                    <div class="pt-4 border-top">
                        <button type="submit" class="btn btn-primary me-3">Aggiorna Categoria</button>
                        <a href="{{ route('categories.index') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection