<x-main>
    <div class="text-center container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{ route('mail') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" value="{{ old('name') }}" name="name"
                            type="text">
                        <label for="name">Nome</label>
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" value="{{ old('email') }}" name="email"
                            type="email">
                        <label for="email">E-mail</label>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="message" >{{ old('message') }}</textarea>
                        <label for="message">Testo messaggio</label>
                        @error('message')
                            {{ $message }}
                        @enderror
                    </div>
                  
                    
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Invia Messaggio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>