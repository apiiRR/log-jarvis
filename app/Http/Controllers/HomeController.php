<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Holiday;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') { // Role Admin
            date_default_timezone_set('Asia/Jakarta');
            $tanggal = date("Y-m-d");
            $absen_today = Data::where('date_in', $tanggal)->count();
            $total_user = User::where('role', 'user')->count();
            $total_project = Project::count();
            $total_holiday = Holiday::count();
            $datas = Data::where('date_in', $tanggal)->get();
            // dd($total_user);
            return view('admin.index', [
                'absen_today' => $absen_today,
                'total_user' => $total_user,
                'total_project' => $total_project,
                'total_holiday' => $total_holiday,
                'datas' => $datas,
            ]);
        } elseif (Auth::user()->role == 'user') { // Role User
            // date_default_timezone_set('Asia/Jakarta');
            $user = Auth::user()->id;
            // $tanggal = date("Y-m-d");
            // $datas = Data::where('user_id', $user)->where('date_in', $tanggal)->orderBy('id', 'desc')->first();
            $month_num = date("m");
            $datas = Data::where('user_id', $user)->whereMonth('date_in', $month_num)->orderBy('date_in', 'desc')->get();
            // $datas = $user->datas;
            // dd($datas);
            return view('user.index', compact('datas'));
        }
    }
    
}