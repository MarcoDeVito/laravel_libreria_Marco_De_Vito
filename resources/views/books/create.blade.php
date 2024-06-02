<x-main>

    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" value="{{ old('title') }}" name="title"
                            type="text">
                        <label for="title">Titolo Libro</label>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="pages" value="{{ old('pages') }}" name="pages"
                            type="number">
                        <label for="pages">Pagine Libro</label>
                        @error('pages')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="years" value="{{ old('years') }}" name="years"
                            type="number">
                        <label for="years">Anno del Libro</label>
                        @error('years')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="author_id">Autore</label>
                        <select name="author_id" id="author_id" class="form-control">
                            @forelse ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name . ' ' . $author->surname }}</option>
                            @empty
                            @endforelse

                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="image" name="image" value type="file">
                    </div>
                    @error('image')
                        {{ $message }}
                    @enderror
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
