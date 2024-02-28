<nav class="navbar navbar-expand-lg bg-body-light">
  <div class="container-fluid py-3 px-5">
    <a class="navbar-brand fw-bold" href="/">Perpustakaan SMKN 1 Cisarua</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
        </li>
        {{-- @dd( Request::route()) --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('books*') ? 'active' : '' }}" href="/books">Koleksi</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link {{ Request::is('booking*') ? 'active' : '' }}" href="/booking">Peminjaman</a>
        </li>
        @endauth
      </ul>

      @auth
      <div class="dropdown-center">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
          {{-- <li><a class="dropdown-item" href="#">Profil</a></li>
          <li> --}}
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      @else
      <a href="/login" class="btn btn-warning mx-2">Login <i class="bi bi-box-arrow-in-right"></i></a>
      @endauth
    </div>
  </div>
</nav>