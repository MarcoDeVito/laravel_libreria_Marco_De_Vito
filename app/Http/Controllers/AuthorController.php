<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthorController extends Controller
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
       $authors=Author::paginate(10);
       return view('authors.index',compact('authors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
      
        Author::create([
            'name'=> $request->name,
            'surname'=> $request->surname,
           
        ]);
        return redirect()->route('authors.index')->with('success', 'Creazione Autore avvenuta con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.index',compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update([
            'name'=> $request->name,
            'surname'=> $request->surname,
           
            
        ]);
        return redirect()->route('authors.index')->with('success', 'Modifica Autore avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Cancellazione Autore avvenuta con successo!');
    }
}
