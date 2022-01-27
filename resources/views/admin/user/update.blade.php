@extends('layouts.master')
<style>
    .multiselect {
        width: 100%;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        padding: 5px;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkboxes {
        display: none;
        border: 1px #a0a0a0 solid;
        height: 120px;
        overflow: scroll;
    }

    #checkboxes label {
        display: block;
        padding: 5px;
    }

    #checkboxes label:hover {
        background-color: #1e90ff;
        color: black;
    }
</style>

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
                    <input type="text" class="form-control" value="{{ $datas->name }}" name="name">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="email" class="form-control" value="{{ $datas->email }}" name="email">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Project</label>
                    <div class="multiselect">
                        <div class="selectBox" onclick="showCheckboxes()">
                            <select>
                                <option readonly>-- Choose Project --</option>
                            </select>
                            <div class="overSelect"></div>
                        </div>
                        <div id="checkboxes">
                            @foreach ($projects as $value)
                                <label for="{{ $value->nama }}">
                                <input type="checkbox" id="{{ $value->nama }}" name="pilih[]" value="{{ $value->id }}" @foreach ($datas->project as $item)
                                    @if ($value->id === $item->id)
                                        checked
                                    @endif
                                @endforeach/> {{ $value->nama }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </form>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
@endsection