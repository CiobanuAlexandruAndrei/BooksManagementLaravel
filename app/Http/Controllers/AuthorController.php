<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $autori = Author::all(); 
        return view('authors.index', compact('autori'));
    }

    public function create()
    {
        return view('authors.create'); 
    }

    public function store(StoreAuthorRequest $request)
    {
        Author::create($request->validated());
        return redirect()->route('authors.index')->with('success', 'Autore aggiunto con successo.');
    }

    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());
        return redirect()->route('authors.index')->with('success', 'Autore aggiornato con successo!');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
