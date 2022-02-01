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
                        <th scope="col">NIP</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Project</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIP</th>
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
                        <th>{{ $value->nip }}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>
                            @foreach ($value->project as $item)
                            <span class="badge badge-primary">{{ $item->nama }} <span id="hapus_data" role="button"
                                    data-user="{{ $value->id }}" data-project="{{ $item->id }}"><i
                                        class="fas fa-times-circle text-white"></i></span></span>
                            @endforeach
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{ route('management_account.edit', ['management_account' => $value->id ]) }}"
                                    class="btn btn-primary"><i class="fas fa-cog"></i> Setting Account</a>

                                <form id="delete" action="{{ route('management_account.destroy', ['management_account' => $value->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="if (confirm('Apakah anda yakin menghapus user ini? Hal ini akan mengakibatkan seluruh data yang berhubungan dengan user ini akan hilang.') == false) {
                                    return false;
                                }" type="submit" class="btn btn-danger"><i class="fas fa-trash text-white"></i> Delete</button>
                                </form>
                            </div>
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

    $('body').on('click', '#hapus_data', function () {
        let user_id = $(this).attr("data-user");
        let project_id = $(this).attr("data-project");
        console.log(`${user_id} dan ${project_id}`);
        $.get('hapusProject/' + user_id + '/' + project_id, function (data) {
            if (data) {
                alert('Data Project Berhasil Dihapus');
                location.reload();
            } else {
                alert('Data Project Gagal  Berhasil Dihapus');
            }
        })
    })
</script>
@endsection