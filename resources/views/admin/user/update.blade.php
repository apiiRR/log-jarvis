@extends('layouts.master')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Update Account</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('management_account.update', ['management_account' => $datas->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" value="{{ $datas->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" class="form-control" value="{{ $datas->email }}" readonly>
                </div>
                <div class="form-group">
                    <label>Project</label>
                    <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                        @foreach ($project as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <input type="text" class="form-control" value="{{ $datas->id }}" readonly hidden name="user_id"> --}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </form>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2({
            placeholder: "Select Project"
        });
    });
</script>
@endsection