<x-main>

    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" value="{{ old('name') }}" name="name"
                            type="text">
                        <label for="name">Titolo Libro</label>
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="surname" value="{{ old('surname') }}" name="surname"
                            type="text">
                        <label for="surname">Pagine Libro</label>
                        @error('surname')
                            {{ $message }}
                        @enderror
                    </div>

                   
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>