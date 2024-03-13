@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>
      @media print{
        .table thead tr th:last-child{
          display: none !important;
        }
        .table tbody tr td:last-child{
          display: none !important;
        }
      }
    </style>
@endsection

@section('main-content')
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar User</h1>
    <!-- Button trigger modal -->
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalCreate">
      Tambah Petugas & Admin
    </button>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>NIS</th>
                          <th>Email</th>
                          <th>Role</th>
                          {{-- <th>Password</th> --}}
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->nis_nip }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        {{-- <td>{{ $user->password }}</td> --}}
                        <td class="d-flex flex-row align-items-start gap-1">
                          {{-- <a href="/admin/users/{{ $user->id }}" class="btn btn-info"><i class="bi bi-eye"></i></a> --}}
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $user->id }}"><i class="bi bi-pencil-square"></i>
                          </button>
                          <form action="/admin/users/{{ $user->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                          </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <form action="/admin/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <div class="mb-3">
                                <label for="name" class="form-label">Name <small>(Nama Lengkap)</small></label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $user->name }}">
                              </div>
                              <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $user->username }}">
                              </div>
                              <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $user->nis_nip }}">
                              </div>
                              <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $user->email }}">
                              </div>
                              <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="users" name="users_id">
                                  @foreach ($users as $user)
                                  <option value="{{ $user->id }}">{{ $user->role }}</option>
                                  @endforeach
                                </select>
                              </div>                
                              {{-- <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ $user->password }}">
                              </div> --}}
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
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
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
      // let table = new DataTable('#myTable');

      $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            // 'pdf',
            // 'excel',
            'print'
        ]
      } );
    </script>
@endsection

<!-- Modal Create -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/admin/users" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas & Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="name" class="form-label">Name <small>(Nama Lengkap)</small></label>
          <input type="text" class="form-control" id="title" name="title" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ $user->username }}">
        </div>
        <div class="mb-3">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ $user->nis_nip }}">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $user->email }}">
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="users" name="users_id">
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->role }}</option>
            @endforeach
          </select>
        </div>                
        {{-- <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="text" class="form-control" id="author" name="author" value="{{ $user->password }}">
        </div> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
    </form>
    </div>
</div>