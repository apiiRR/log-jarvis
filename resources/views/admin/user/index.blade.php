@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Management Account</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Project</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Project</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $key => $value)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>
                            @foreach ($value->project as $item)
                                <span class="badge badge-primary">{{ $item->nama }}</span> 
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('management_account.edit', ['management_account' => $value->id ]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i>  Tambah Project</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection