<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\User_Has_Project;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::where('role', 'user')->get();
        // dd($users);
        return view('admin.user.index', compact('users'));
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
        $datas = User::find($id);
        $projects = Project::all();
        return view('admin.user.update', [
            'datas' => $datas,
            'projects' => $projects,
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
        $listProject = [];
        $user = User::find($id);
        $user->nip = $request->nip;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        foreach ($user->project as $value) {
            array_push($listProject, $value->id);
        }

        if (!empty($request->pilih)) {
            foreach ($request->pilih as $value) {
                if (!in_array($value, $listProject)) {
                    $user->project()->attach($value);
                }
            }
        }
        
        return redirect('/management_account')->with('success', 'Data saved successfully');
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
}