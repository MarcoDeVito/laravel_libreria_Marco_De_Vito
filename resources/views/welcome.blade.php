<x-main>
    @auth
        <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Benvenuto {{ Auth::user()->name }}</h1>
                    <p class="col-md-8 fs-4">Qui puoi creare nuovi
                        libri, clicca sul pulsante in basso per
                        accedere alla sezione dedicata </p>
                    <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg" type="button">Nuovo Libro</a>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-4">
                    <div class="h-100 p-5 text-bg-dark rounded-3">
                        <h2>Amministra i Libri</h2>

                        <a href="{{ route('books.index') }}" class="btn btn-outline-light" type="button">Vedi Libri</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Gestione Categorie</h2>

                        <button class="btn btn-outline-secondary" type="button">Vedi categorie</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5  border rounded-3">
                        <h2>Gestione Autori</h2>
                        <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary" type="button">Vedi Autori</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h2>Benvenuto Ospite</h2>
        <p>Accedi per vedere tutte le funzionalità</p>
    @endauth

</x-main>