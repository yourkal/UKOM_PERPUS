@extends('layouts.main')

@section('style')
<style>
.card-wrapper{
  margin-bottom: 1.5rem;
}
.card{
  margin-top:20px;
  height: 100%;
}
.card .btn{
  border-radius:2px;
  text-transform:uppercase;
  font-size:12px;
  padding:7px 20px;
}
.card .card-img-block {
  width: 91%;
  margin: 0 auto;
  position: relative;
  top: -20px;
  transition: .3s all ease-in-out;
}
.card:hover .card-img-block{
  top: -30px;
}
.card .card-img-block img{
  border-radius:5px;
  box-shadow:0 0 10px rgba(0,0,0,0.43);
}
.card h5{
  font-weight:600;
  margin-top: -4px;
}
.card p{
  font-size:14px;
  font-weight:300;
}
</style>
@endsection

@section('main-content')
<div class="container my-4">
  
  {{-- notif success --}}
  {{-- @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif --}}

  <div class="search col-lg-4 m-auto">
    <form action="/koleksi" method="get">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari buku..." name="searchKeyword">
        <select class="form-select" style="flex: unset; width: 120px;" name="category">
          <option value="" selected>Kategori</option>
          <option value="1">Fiksi</option>
          <option value="2">Non Fiksi</option>
        </select>
        <button class="btn btn-warning" type="submit">Cari</button>
      </div>
    </form>
  </div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 mt-4">
  @foreach ($books as $book)
  <a href="/books/{{ $book->id }}" class="card-wrapper col-md-4 mt-4 text-decoration-none">
    <div class="card">
        <div class="card-img-block">
          @if($book->cover)
          <img class="card-img-top" src="/storage/{{ $book->cover }}" alt="Card image cap">
          @else
          <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
          @endif
        </div>
        <div class="card-body pt-0">
          <h5 class="card-title">{{ $book->title }}</h5>
          <p class="card-text">{{ $book->description }}</p>
        </div>
      </div>
  </a>
  @endforeach
</div>
</div>
@endsection