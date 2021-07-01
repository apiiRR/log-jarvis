@extends('layouts.master')

@push('tambahan')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endpush

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black;">Control Admin</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped text-center" style="color: black">
                <thead>
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Allow fill past absent</td>
                        <td>
                            <input type="checkbox" data-id="{{ $status->id }}" value="{{ $status->id }}" name="toggle" class="js-switch"
                                {{ $status->kondisi == 1 ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="table-responsive">
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
    @endsection