@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('main-content')
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tables</h1>
    <!-- Button trigger modal -->
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCreate">
      Tambah Buku
    </button>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Kode</th>
                          <th>Judul Buku</th>
                          <th>Tgl Pinjam</th>
                          <th>Tgl Kembali</th>
                          <th>Stock Buku</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->code }}</td>
                        <td>{{ $booking->book->title }}</td>
                        <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                        <td>{{ date('d-m-Y', strtotime($booking->expired_at)) }}</td>
                        <td>{{ $booking->book->stock }}</td>
                        <td>
                          @if($booking->status == 'Dikembalikan')
                            @if ($booking->expired_at < now())
                              <p class="badge text-bg-danger">{{ $booking->status }} terlambat</p>
                            @else
                              <p class="badge text-bg-secondary">{{ $booking->status }}</p>
                            @endif
                          @elseif($booking->expired_at < now())
                            <p class="badge text-bg-danger">Terlambat</p>
                          @else
                          <p class="badge {{ ($booking->status == 'Diajukan') ? 'text-bg-warning' : '' }} {{ ($booking->status == 'Disetujui') ? 'text-bg-success' : '' }} {{ ($booking->status == 'Ditolak') ? 'text-bg-dark' : '' }} mb-0">{{ $booking->status }}</p>
                          @endif
                        </td>
                        <td class="d-flex flex-row align-items-start gap-1">
                          <a href="/admin/booking/{{ $booking->id }}" class="btn btn-info">Proses Peminjaman</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
@endsection

@section('script')
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
      let table = new DataTable('#myTable');
    </script>
@endsection