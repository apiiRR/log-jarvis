@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pay Slip</h1>
    <a href="{{ route('pay_slip.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus-circle text-white-50"></i> Add Pay Slip</a>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group">
            <label><strong>Select name :</strong></label>
            <select class="form-control" id="pilih_user">
                <option value="">-- Select Name --</option>
                @foreach ($datas as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="isi">
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
    let format = new Intl.NumberFormat('id-ID');

    $('body').on('change', '#pilih_user', function () {
        let id = $(this).val();
        $.get('pay_slip/' + id, function (data) {
            console.log(data.length > 0)
            if (data.length > 0) {
                $.each(data, function (i, item) {
                    console.log(item.id)
                    $('#isi').html(`
                        <tr>
                            <td>${ i+1 }</td>
                            <td>${ item.to }</td>
                            <td>Rp. ${ format.format(item.total) }</td>
                            <td>
                                <a class="btn btn-success" href="/send-email/${item.id}"><i class="fas fa-paper-plane"></i> Send</a>
                                <a class="btn btn-warning" href="pay_slip/${item.id}/edit"><i class="fas fa-pen-alt"></i> Edit</a>
                                <a class="btn btn-info" href="/cetak_payslip/${item.id}"><i class="fas fa-file-download"></i> PDF</a>
                            </td>
                        </tr>
                    `)
                })
            } else {
                $('#isi').html(
                    `<tr class="odd"><td valign="top" colspan="4" class="dataTables_empty">No data available in table</td></tr>`
                    )
            }
        })
    })
</script>
@endsection