@extends('layouts.app')

@section('title', 'I miei Libri')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
                </div>
                <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un Libro</a>
                <h2 class="mt-5 mb-4">I miei Libri</h2>
            </div>
        </section>
        <section class="row">
            <div class="col-md-12">
                <div class="list-book">
                    @foreach ($libri as $libro)
                        <article class="card border-0 mb-3">
                            <div class="card-body">
                                <div class="book-top">
                                    <h3 class="card-title" style="height: 70px;">{{ $libro->title }}</h3>
                                    <div>di {{ $libro->author->name }}</div>
                                    <div class="mt-2"><span class="badge text-bg-secondary">{{ $libro->category->name }}</span></div>
                                </div>
                                
                                <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                                    <a href="{{ route('books.show', $libro) }}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('books.edit', $libro) }}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('books.destroy', $libro) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo libro?');" class="btn btn-light"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection