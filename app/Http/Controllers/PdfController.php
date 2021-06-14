<?php

namespace App\Http\Controllers;

use App\Models\Data;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function cetak($id) {
        $datas = Data::all()->where('user_id', $id);
        // dd($datas[1]->user->name);
        // $pdf->set_base_path(realpath(APPLICATION_PATH . '../../../public/css/pdf'));
        $pdf = PDF::loadView('print_absent', compact('datas'));
        // $pdf = PDF::loadView('print_absent', $datas);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('absent.pdf');
    }

    public function user($id) {
        $datas = Data::all()->where('user_id', $id);
        // dd($datas[1]->user->name);
        // $pdf->set_base_path(realpath(APPLICATION_PATH . '../../../public/css/pdf'));
        $pdf = PDF::loadView('print_absent_user', compact('datas'));
        // $pdf = PDF::loadView('print_absent', $datas);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('absent.pdf');
    }
}