<?php

namespace App\Http\Controllers;

use App\Models\futsal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    //
    public function index(Request $request)
    {
        $database = DB::table('futsals')->paginate(10);
        return view('index',  ['database'=>$database]);

    }

    public function database()
    {
        $futsal = futsal::all();
       
        return view('layouts.database')->with(['database' => $futsal ]);
        
    }
    public function futsal()
    {
        return view('layouts.tambah_futsal');
    }
    public function store(Request $request)
    {
        DB::table('futsals')->insert([
            'nama_club' => $request->nama_club,
            'anggota' => $request->anggota,
            'waktu_pendaftaran' => $request->waktu_pendaftaran
            
        ]);


        return redirect('/database');
    }
    public function edit($id){
        $database = DB::table('futsals')->where('id', $id)->get();
        return view('/layouts/edit',['database' => $database]);

        
    }
   public function update (Request $request){
    DB::table('futsals')->where('id', $request->id)->update([
        'nama_club' => $request->nama_club,
        'anggota' => $request->anggota,
        'waktu_pendaftaran' => $request->waktu_pendaftaran
        
        
    ]);
    return redirect('/database');
   }
   public function hapus($id){
    DB::table('futsals')->where('id', $id)->delete();
    return redirect('/database');
   }
   public function cari(Request $request){

    $cari = $request->cari;

    $database = DB::table('futsals')
    ->where('nama_club','like','%'.$cari.'%')
    ->paginate();

    return view('layouts.database', ['database' => $database]);
   }
}
