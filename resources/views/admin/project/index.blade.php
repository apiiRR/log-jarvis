@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Project</h1>
    <a href="{{ route('project.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle text-white-50"></i> Add New Project</a>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($project as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="d-flex justify-content-center">
                            <form id="delete" action="{{ route('project.destroy', ['project' => $item->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="if (confirm('Apakah anda yakin menghapus project ini? Hal ini akan mengakibatkan seluruh data yang berhubungan dengan project ini akan hilang.') == false) {
                                    return false;
                                }" type="submit" class="btn btn-dark"><i
                                        class="fas fa-trash text-white"></i></button>
                            </form>
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