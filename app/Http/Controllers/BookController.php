<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{

    public function index()
    {
        $libri = Book::with(['author', 'category'])->get();
        return view('books.index', compact('libri'));
    }
    

    public function create()
    {
        $autori = Author::all();
        $categorie = Category::all();
        return view('books.create', compact('autori', 'categorie'));
    }

    public function store(StoreBookRequest $request)
    {
        $libroData = $request->validated();

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $destinationPath = public_path('covers');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file)->resize(400, 520);
            $image->save($destinationPath . '/' . $filename);

            $libroData['cover_image'] = 'covers/' . $filename;
        }

        Book::create($libroData);
        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo!');
    }


    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $autori = Author::all();
        $categorie = Category::all();
        return view('books.edit', compact('book', 'autori', 'categorie'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $libroData = $request->validated();

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                $oldImagePath = public_path('covers/' . $book->cover_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('cover_image');
            $destinationPath = public_path('covers');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file)->resize(400, 520);
            $image->save($destinationPath . '/' . $filename);

            $libroData['cover_image'] = 'covers/' . $filename;
        }

        $book->update($libroData);
        return redirect()->route('books.index')->with('success', 'Libro aggiornato con successo!');
    }

    public function destroy(Book $book)
    {
   
        if ($book->cover_image) {
            $oldImagePath = public_path('covers/' . $book->cover_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); 
            }
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminato con successo!');
    }

    public function apiIndex()
    {
        $libri = Book::with(['author', 'category'])->get();
        return response()->json($libri);
    }
}
