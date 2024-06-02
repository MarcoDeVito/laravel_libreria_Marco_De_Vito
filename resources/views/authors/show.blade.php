<x-main>
    <div class="container mt-5">
        <div class="row g-5">
            <div class="col-md-12">
                <div class=" pb-5">
                    <h1 class="pb-4 mb-4 fst-italic ">
                        {{ $author->name." ".$author->surname }}
                    </h1>
                </div>

            </div>
            <h2>Libri scritti:</h2>
            <ul>
                @forelse ($author->books as $book)
                <li>
                    <p>{{$book->title}}</p>
                </li>  
                @empty
                   <p>Nessun libro</p> 
                @endforelse
               
            </ul>
          
            
        </div>

    </div>

</x-main>