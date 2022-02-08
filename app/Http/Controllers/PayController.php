<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Pay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaySlipMail;

class PayController extends Controller
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
        $datas = User::where('role', 'user')->get();
        return view("admin.pay.index", [
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = User::where('role', 'user')->get();
        return view("admin.pay.create", [
            'datas' => $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Pay::create([
            "user_id" => $request["pilih-user"],
            "title" => $request["user-title"],
            "basic_sallary" => $request["basic-sallary"],
            "bpjs_tk" => $request["bpjs-tk"],
            "bpjs_kes" => $request["bpjs-kes"],
            "overtime" => $request["overtime-total"],
            "certificate_allowance" => $request["certification"],
            "tax" => $request["tax"],
            "laptop" => $request["laptop"],
            "total" => $request["net"],
            "from" => $request["tanggal-awal"],
            "to" => $request["tanggal-akhir"]
        ]);

        return redirect('/pay_slip')->with('success', 'Pay Slip Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Pay::select('pay_slip.*', 'users.name', 'users.nip')->join('users', 'pay_slip.user_id', '=', 'users.id')->where("pay_slip.user_id", $id)->get();
        // dd($datas);
        return response()->json(json_decode($datas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = User::where('role', 'user')->get();
        $pay_data = Pay::select('pay_slip.*', 'users.name', 'users.nip')->join('users', 'pay_slip.user_id', '=', 'users.id')->where("pay_slip.id", $id)->first();
        return view("admin.pay.edit", [
            'datas' => $datas,
            'pay_data' => $pay_data
        ]);
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
        $data = Pay::where('id', $id)->update([
            "user_id" => $request["pilih-user"],
            "title" => $request["user-title"],
            "basic_sallary" => $request["basic-sallary"],
            "bpjs_tk" => $request["bpjs-tk"],
            "bpjs_kes" => $request["bpjs-kes"],
            "overtime" => $request["overtime-total"],
            "certificate_allowance" => $request["certification"],
            "tax" => $request["tax"],
            "laptop" => $request["laptop"],
            "total" => $request["net"],
            "from" => $request["tanggal-awal"],
            "to" => $request["tanggal-akhir"]
        ]);

        return redirect('/pay_slip')->with('success', 'Pay Slip Berhasil Diupdate');
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

    public function overtime($id, $from, $to) {
        $datas = Data::where('user_id', $id)->whereBetween('date_in', [$from, $to])->get();
        $hasil = 0;
        foreach ($datas as $data) {
            $hasil = $hasil + intval($data->intensive);
        }
        // dd($hasil);
        return response()->json($hasil);
    }

    public function user_current($id) {
        $data = User::select('nip')->where('id', $id)->first();

        return response()->json($data);
    }

    public function email($id) {
        $pay_data = Pay::select('pay_slip.*', 'users.email', 'users.name', 'users.nip')->join('users', 'pay_slip.user_id', '=', 'users.id')->where("pay_slip.id", $id)->first();

        Mail::to($pay_data->email)->send(new PaySlipMail($pay_data));

        if (Mail::failures()) {
            return redirect('/pay_slip')->with('success', 'Data Failed to Send to '. $pay_data->email);
        }else{
            return redirect('/pay_slip')->with('success', 'Data Sent Successfully to '. $pay_data->email);
        }
    } 
}