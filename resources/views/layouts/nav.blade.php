<nav  class="navbar navbar-expand-lg navbar-light bg-body-tertiary px-5 position-absolute top-0 start-0 w-100" style="z-index: 1030;">
    <div class="container-fluid">
      <button
        data-mdb-collapse-init
        class="navbar-toggler"
        type="button"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        Expandir
    </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand mt-2 mt-lg-0" href="{{route("dashboard")}}">
          {{config("app.name")}}
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{route("dashboard")}}">Início</a>
          </li>
          @if (auth()->user()->is_admin)
            <li class="nav-item">
              <a class="nav-link" href="{{route("users.index")}}">Usuários</a>
            </li>
          @endif
        </ul>
      </div>
  
      <div class="d-flex align-items-center">
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <div class="dropdown">
          <a
            data-mdb-dropdown-init
            class="dropdown-toggle d-flex align-items-center text-dark"
            href="#"
            role="button"
            aria-expanded="false"
          >
            {{auth()->user()->name}}
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
          >
            {{-- <li>
              <a class="dropdown-item" href="#">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li> --}}
            <li>
                <form action="{{route("logout")}}" method="POST">
                    @csrf
                    @method("POST")
                    <button type="submit" class="dropdown-item">Sair</button>
                </form>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>