<?php

namespace App\Http\Controllers;

use App\Voter;
use Illuminate\Http\Request;
use App\Imports\VotersImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class AdminVoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Voter::all();
        return view('admin.voters.voter', compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.voters.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = $this->validate($request, [
            'nisn' => 'required | unique:voters,nisn',
            'namapemilih' => 'required',
            'kelas' => 'required',
        ]);

        $password = $this->randomString();
        $pemilih = Voter::create([
            'nisn' => request('nisn'),
            'name' => request('namapemilih'),
            'class' => request('kelas'),
            'password' => Hash::make($password),
            'realpass' => $password,
            'status' => 0
        ]
        );

        return redirect('admin/voters');
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
        $milih = Voter::find($id);
        return view('admin/voters/edit', compact('milih'));
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
        $errors = $this->validate($request, [
            'nisn' => 'required | unique:voters,nisn,'.$id,
            'namapemilih' => 'required',
            'kelas' => 'required',
        ]);
        Voter::find($id)->update([
            'nisn' => request('nisn'),
            'name' => request('namapemilih'),
            'class' => request('kelas')
        ]);
        return redirect('admin/voters');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voter = Voter::find($id);
        $voter->delete();
        return redirect('admin/voters');
    }

    public function import(Request $request) 
    {
        $errors = $request->validate([
            'excel' => 'required|mimes:ods,xlsx, xls',
        ]);
        Excel::import(new VotersImport, request()->file('excel'));
        
        return redirect('admin/voters');
    }

    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
