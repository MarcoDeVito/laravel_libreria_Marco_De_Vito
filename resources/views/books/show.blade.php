<x-main>
    <div class="container mt-5">
        <div class="row g-5">
            <div class="col-md-12">
                <div class=" pb-5">
                    <h1 class="pb-4 mb-4 fst-italic ">
                        {{ $book->title }}
                    </h1>
                </div>

            </div>

            <img class="img-fluid" style="width:12%"
                                    src="{{ $book->image ? Storage::url($book->image) : '/book.png' }}"
                                    alt="Copertina libro" />
            <div>
                <ul>
                    <li>
                        <p>Numero Pagine: {{ $book->pages ?? 'Non definito' }}</p>
                    </li>
                    <li>
                        <p>Anno libro: {{ $book->years ?? 'Ignoto' }}</p>
                    </li>
                    <li>
                        <p>Autore: {{ $book->author->name.' '. $book->author->surname  ?? 'Ignoto' }}</p>
                    </li>
                   
                    
                </ul>
            </div>
        </div>

    </div>

</x-main>