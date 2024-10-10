@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <main class="container">
        <section class="row mb-5">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
                </div>
            </div>
        </section>
        <article class="detail-book row py-3 px-1 rounded-4">
            <div class="col-md-4">
                <figure>
                    <img src="{{ $book->cover_image ? asset($book->cover_image) : asset('img/no-cover.webp') }}" class="rounded" alt="{{ $book->title }}">
                </figure>
            </div>
            <div class="col-md-4">
                <h2 class="mb-3">{{ $book->title }}</h2>
                <div>
                    <p>{{ $book->description }}</p>
                </div>
                <div class="border-top mt-2 pt-3">
                    <span class="badge text-bg-secondary">{{ $book->author->name }}</span> 
                    <span class="badge text-bg-secondary">{{ $book->category->name }}</span> 
                    <span class="badge text-bg-secondary">{{ $book->pages }} pagine</span>
                </div>
            </div>
        </article>
    </main>
@endsection