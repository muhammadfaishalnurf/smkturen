<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class baseController extends Controller
{
    public function index()
    {
        $database = DB::table('absensis')->paginate(10);
        return view("index");
    }
    public function database()
    {
        $absen = absensi::all();
        return view("layouts.database")->with(['database' => $absen]);
    }
    public function absen()
    {
        return view("layouts.absen");
    }
    
    public function store(Request $request) {

        DB::table('absensis')-> insert([
            'nama_siswa' => $request-> nama_siswa,
            'jam_masuk' => $request-> jam_masuk
        ]);
        return redirect('/database');
    }
    public function edit ($id){
        $database = DB::table('absensis')->where('id',$id)->get();
        return view('/layouts/edit',['database'=>$database]);
        
        
    }
    public function update(Request $request)
    {
        DB::table('absensis')->where('id',$request->id)->update([
            'nama_siswa' => $request->nama_siswa,
            'jam_masuk'=> $request->jam_masuk
        ]);
        return redirect('/database');
    }
    public function hapus($id){
        DB::table('absensis')->where('id',$id)->delete();
        
        return redirect('/database');
    }
    public function cari (Request $request){
        $cari = $request->cari;

        $database = DB::table('absensis')
        ->where('nama_siswa','like',"%".$cari."%")
        ->paginate();

        return view('layouts.database',['database'=>$database]);
    }
    
   
}
