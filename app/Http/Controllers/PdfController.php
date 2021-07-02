<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetak($id, $from, $to) {
        $datas = Data::where('user_id', $id)->whereBetween('date_in', [$from, $to])->orderBy('date_in', 'ASC')->get();
        $user = User::select('name')->where('id', $id)->first();
        // dd($datas);
        // $pdf->set_base_path(realpath(APPLICATION_PATH . '../../../public/css/pdf'));
        $pdf = PDF::loadView('print_absent', compact('datas'));
        // $pdf = PDF::loadView('print_absent', $datas);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($user->name.'_'.$from.'-'.$to.'.pdf');
    }

    public function user($from, $to) {
        // dd($from, $to);
        $datas = Data::where('user_id', Auth::user()->id)->whereBetween('date_in', [$from, $to])->orderBy('date_in', 'ASC')->get();
        $user = User::select('name')->where('id', Auth::user()->id)->first();
        // $datas = $datas
        // dd($datas);
        // dd($datas[1]->user->name);
        // $pdf->set_base_path(realpath(APPLICATION_PATH . '../../../public/css/pdf'));
        $pdf = PDF::loadView('print_absent_user', compact('datas'));
        // $pdf = PDF::loadView('print_absent', $datas);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($user->name.'_'.$from.'-'.$to.'.pdf');
    }
}