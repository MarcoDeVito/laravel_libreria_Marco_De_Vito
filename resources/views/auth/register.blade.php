<x-main>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="p-5 border rounded" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome
                    utente</label>
                <input type="text" name="name" class="form-control" id="name">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email
                    utente</label>
                <input type="email" name="email" class="form-control" id="email">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Registrati</button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-primary">Sei gia registrato? Clicca qui</a>
        </form>
    </div>
</x-main>