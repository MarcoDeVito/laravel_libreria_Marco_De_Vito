<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return[
            new Middleware('auth', except:['show','index']),
        ];
    }
    public function index()
    {   
       $books= Book::paginate(5); 
       return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $authors=Author::all();
        return view('books.create',compact('authors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // dd($request->image);
        
        $path_image = '';
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $file_name);
        }
        $book= Book::create([
            'title'=> $request->title,
            'years'=> $request->years,
            'pages'=> $request->pages,
            'author_id'=>$request->author_id,
            'image'=>$path_image,

        ]);

        $book->categories()->attach($request->categories);
        return redirect()->route('books.index')->with('success', 'Creazione Libro avvenuta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
       
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories=Category::all();
        
        return view('books.edit',compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $path_image = $book->image;
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            $path_image = $request->file('image')->storeAs('public/images', $file_name);
        }
        $book->update([
            'title'=> $request->title,
            'years'=> $request->years,
            'pages'=> $request->pages,
            'image'=>$path_image
        ]);
        $book->categories()->detach();
        $book->categories()->attach($request->categories);
        //  $book->categories()->sync($request->categories);

        return redirect()->route('books.index')->with('success', 'Modifica Libro avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->categories()->detach();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Cancellazione Libro avvenuta con successo!');
    }
}
