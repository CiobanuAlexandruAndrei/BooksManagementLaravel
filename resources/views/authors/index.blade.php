@extends('layouts.app')

@section('title', 'Lista Autori')

@section('content')
    <section class="row">
        <div class="col-md-12 my-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
            </div>
            <a href="{{ route('authors.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un'Autore</a>
            <h2 class="mt-5 mb-4">Gli Autori</h2> 
        </div>
        <div class="col-md-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="w-auto">#</th>
                        <th scope="col" class="w-50">Autore</th>
                        <th scope="col" class="w-25">Data di nascita</th>
                        <th scope="col" class="w-auto text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autori as $autore)
                    <tr>
                        <td class="align-middle">{{ $autore->id }}</td>
                        <td class="align-middle">{{ $autore->name }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($autore->birthday)->format('d F Y') }}</td>
                        <td class="text-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('authors.edit', $autore->id) }}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('authors.destroy', $autore->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Sei sicuro? Stai eliminando un autore.')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection