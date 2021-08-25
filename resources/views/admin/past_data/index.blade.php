@extends('layouts.master')

@push('tambahan')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Administrator</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>Allow fill past absent</td>
                        <td>
                            <input type="checkbox" data-id="{{ $status->id }}" value="{{ $status->id }}" name="toggle"
                                class="js-switch" {{ $status->kondisi == 1 ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function (html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });

    $('input[name=toggle]').change(function () {
        var mode = $(this).prop('checked');
        var id = $(this).val();

        var productObj = {};
        productObj.mode = $(this).prop('checked');
        productObj.comment_id = $(this).val();
        productObj._token = '{{csrf_token()}}';

        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "{{ url('/status/update') }}",
            data: productObj,
            success: function (data) {}
        });
    });
</script>
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection