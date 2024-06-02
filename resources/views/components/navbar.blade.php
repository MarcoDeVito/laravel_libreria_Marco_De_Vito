<header
    class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0 ms-3">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <h1>{{ env('APP_NAME') }}</h1>
        </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('homepage')}}" class="nav-link px-2 @if (request()->routeIs('homepage'))  link-secondary @endif">Home</a></li>
        <li><a href="{{route('books.index')}}" class="nav-link px-2  @if (request()->routeIs('books.index'))  link-secondary @endif">Prodotti</a></li>
        <li><a href="{{route('authors.index')}}" class="nav-link px-2  @if (request()->routeIs('authors.index'))  link-secondary @endif">Autori</a></li>
        <li><a href="{{route('contact')}}" class="nav-link px-2  @if (request()->routeIs('contact'))  link-secondary @endif">Contatti</a></li>
    </ul>
    @guest
    <div class="col-md-3 text-end me-3">
        <a href="{{route('login')}}" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Accedi</a>
        <a href="{{route('register')}}" class="btn btn-primary">Registrati</a>
    </div>

  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-body">
            <form action="{{ route('login') }}" method="post" >
                @csrf
        
               
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mb-4 mt-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
        
                <button class="btn btn-primary  py-2" type="submit">Accedi</button>
                <a href="{{route('register')}}" class="btn btn-outline-primary py-2">Non sei registrato?</a>
               
        
        
                <div class="text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
        
    @endguest

    @auth
    <div class="col-md-3 text-end me-3">
        <span class="me-3">Benvenuto {{auth()->user()->name ?? "Anonimo"}}</span>
        <form class="d-inline" action="{{route('logout')}}" method="post">
            @csrf        
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
    </div>
    @endauth
</header>
