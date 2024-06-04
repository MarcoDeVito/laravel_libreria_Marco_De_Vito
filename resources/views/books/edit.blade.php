<x-main>

    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" value="{{ $book->title }}" name="title"
                            type="text">
                        <label for="title">Titolo Libro</label>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="pages" value="{{ $book->pages }}" name="pages"
                            type="number">
                        <label for="pages">Pagine Libro</label>
                        @error('pages')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="years" value="{{ $book->years }}" name="years"
                            type="number">
                        <label for="years">Anno del Libro</label>
                        @error('years')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        @foreach ($categories as $category)
                            <div>
                                <input type="checkbox" id="category" name="categories[]" value="{{ $category->id }}"
                                    {{-- @if ($book->categories->contains($category->id)) checked @endif --}}
                                    @checked($book->categories->contains($category->id))
                                    >
                                <label for="category">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="image" name="image" value type="file">
                    </div>
                    @error('image')
                        {{ $message }}
                    @enderror
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
