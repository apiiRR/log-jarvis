@extends('layouts.master')

@section('content')
@php
$ui = '';
if (sizeof($datas) == 0) {
    $ui = '';
} else {
    $ui = $datas[0]->user_id;
}
// dd($ui);
@endphp
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold" style="color: black">Absents Data</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped text-center" style="color: black">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Project</th>
                        <th scope="col">Date</th>
                        <th scope="col">Day</th>
                        <th scope="col">In</th>
                        <th scope="col">Out</th>
                        <th scope="col">Total</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Site</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $key => $value)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$value->user->name}}</td>
                        <td>{{$value->user->project->nama}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->day}}</td>
                        <td>{{$value->time_in}}</td>
                        <td>{{$value->time_out}}</td>
                        <td>{{$value->total_hours}}</td>
                        <td>{{$value->activity}}</td>
                        <td>{{$value->site_name}}</td>
                        <td>{{$value->remark}}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{route('absent.edit', ['absent' => $value->id])}}" class="btn btn-dark mr-2"><i
                                    class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-dark" onclick="event.preventDefault();
                                                    document.getElementById('delete').submit();"><i
                                    class="fas fa-trash"></i></a>
                            <form id="delete" action="{{ route('absent.destroy', ['absent' => $value->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <input type="submit" class="btn btn-danger"
                                                                    value="Delete"> --}}
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
                </tbody>
            </table>
            <div class="table-responsive">
            </div>
        </div>
        <div class="btn-group">
            <button type="button" class="btn dropdown-toggle"
                style="background-color: #C9CACA; font-weight:bolder; color:black" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Print Data
            </button>
            <div class="dropdown-menu">
                <a href="/pdf/{{$ui}}" class="dropdown-item">Export PDF</a>
            </div>
        </div>
    </div>
    @endsection