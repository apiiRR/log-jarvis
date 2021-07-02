<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Holiday;
use App\Models\User;
use Illuminate\Http\Request;

class AbsentController extends Controller
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
        $names = User::select('id', 'name')->where('role', 'user')->get();
        // $names = User::select('name')->where('id', $datas)->get();
        // dd($names);
        return view('admin.absent.index', compact('names'));
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
        $data = Data::find($id);
        return view('admin.absent.edit', compact('data'));
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
        $lembur = "none";
        $total = $request["total_hours"];
        // dd($request);
        $time_out = $request["time_out"];
        // dd(strtotime($time_out) >= strtotime('21:00'));
        $total_jam = explode(':',$total, 2);
        $t_jam = intval($total_jam[0]);
        $t_menit = intval($total_jam[1]);
        $total_menit = ($t_jam * 60) + $t_menit;
        $tanggalMasuk = $request["date_in"];
        $tanggalKeluar = $request["date_out"];
        $hari = $request["day_in"];
        $holiday = Holiday::select('date')->get()->toArray();

        if (($hari == 'Saturday') or ($hari == 'Sunday') or (in_array($tanggalMasuk, $holiday))) {
            if ($total_menit >= 240) {
                $lembur = "weekend 1";
            } elseif ($total_menit >= 480) {
                $lembur = "weekend 2";
            }
        } else {
            if (strtotime($time_out) >= strtotime('21:00')) {
                $lembur = "lembur 1";
            } elseif ($tanggalMasuk != $tanggalKeluar) {
                $lembur = "lembur 2";
            }
        }

        $intensive = 0;
        switch ($lembur) {
            case "lembur 1":
                $intensive = 25000;
                break;
            case "lembur 2":
                $intensive = 50000;
                break;
            case "weekend 1":
                $intensive = 50000;
                break;
            case "weekend 2":
                $intensive = 150000;
            break;
            default:
                $intensive = 0;
        }

        $request->validate([
            'date_in' => 'required|date',
            'day_in' => 'required|max:255',
            'time_in' => 'required',
            'date_out' => 'required|date',
            'day_out' => 'required|max:255',
            'time_out' => 'required',
            'total_hours' => 'required',
            'activity' => 'required|max:255',
            'site_name' => 'required|max:255',
            'name' => 'required',
        ]);

        $data = Data::where('id', $id)->update([
            "date_in" => $request["date_in"],
            "day_in" => $request["day_in"],
            "time_in" => $request["time_in"],
            "date_out" => $request["date_out"],
            "day_out" => $request["day_out"],
            "time_out" => $request["time_out"],
            "total_hours" => $request["total_hours"],
            "activity" => $request["activity"],
            "site_name" => $request["site_name"],
            "user_id" => $request["name"],
            "remark" => $lembur,
            "intensive" => $intensive,
        ]);


        return redirect('/absent')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* $user = Data::select('user_id')->where('id', $id)->get(); */
        // dd($user);
        // $user_id = intval($user);
        Data::destroy($id);
        return redirect('/absent')->with('success', 'Data deleted successfully');
    }

    public function tampil($id){
        $datas = Data::where('user_id', $id)->orderBy('date_in', 'ASC')->get();
        // dd($datas);
        return view('admin.absent.list', compact('datas'));
    }
}