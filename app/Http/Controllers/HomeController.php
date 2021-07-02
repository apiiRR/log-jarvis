<?php

namespace App\Http\Controllers;

use App\Models\Data;
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
            $datas = Data::orderBy('date_in', 'ASC')->get();
            // dd($datas);
            return view('admin.index', compact('datas'));
        } elseif (Auth::user()->role == 'user') { // Role User
            date_default_timezone_set('Asia/Jakarta');
            $user = Auth::user()->id;
            $tanggal = date("Y-m-d");
            // $datas = Data::where('user_id', $user)->where('date_in', $tanggal)->orderBy('id', 'desc')->first();
            $datas = Data::where('user_id', $user)->whereNotNull('date_in')->whereNull('date_out')->orderBy('id', 'desc')->first();
            // $datas = $user->datas;
            // dd($datas);
            return view('user.index', compact('datas'));
        }
    }
    
}