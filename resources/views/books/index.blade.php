<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="text-center container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="container mt-5">
            <div class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Libri inseriti</h3>
                <form class="d-flex" role="search" action="#" method="POST">
                    <input class="form-control me-2" name="search" type="search" placeholder="Cerca Articolo"
                        aria-label="Search">
                </form>
                @auth
                <a href="{{ route('books.create') }}" type="button" class="btn btn btn-success me-md-2">
                    Crea Nuovo Libro
                </a>
                @endauth
            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Titolo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <th scope="row">#{{ $book->id }}</th>
                            <td>
                                <img class="card-img-top" style="width:3rem"
                                src="{{ $book->image ? Storage::url($book->image) : 'book.png' }}"
                                    alt="Copertina libro" />
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{route('books.show',['book'=>$book->id])}}"
                                        class="btn btn-primary me-md-2">
                                        Visualizza
                                    </a>
                                    @auth
                                    <a href="{{route('books.edit',['book'=>$book->id])}}"
                                            class="btn btn-warning me-md-2">
                                            Modifica
                                        </a>
                                        
                                            <form action="{{route('books.destroy',['book'=>$book->id])}}" method="post">
                                            
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger me-md-2">Elimina</button>
                                           
                                            </form>
                                    @endauth

                                 
                                </div>
                            </td>
                        </tr>
                    @empty
                    Nessun Libro presente
                    @endforelse

                </tbody>
            </table>
            {{ $books->links() }}
        </div>


    </div>

</x-main>