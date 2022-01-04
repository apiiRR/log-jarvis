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
                    <label for="formGroupExampleInput">NIP</label>
                    <input type="text" class="form-control" value="{{ $datas->nip }}" name="nip">
                </div>
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
                    <div style="border: 1px solid #c8c9cf; border-radius: 8px" class="px-2">
                        @foreach ($project as $item)
                        <div class="custom-control custom-checkbox custom-inline">
                            <input type="checkbox" class="custom-control-input" id="custom{{ $item->id }}"
                                value="{{ $item->id }}" name="states[]" @foreach ($datas->project as $value)
                            @if ($value->id == $item->id)
                            checked
                            @endif
                            @endforeach>
                            <label class="custom-control-label" for="custom{{ $item->id }}">{{ $item->nama }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <input type="text" class="form-control" value="{{ $datas->id }}" readonly hidden name="user_id">
                --}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </form>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@endsection