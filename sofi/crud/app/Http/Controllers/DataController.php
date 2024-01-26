<?php

namespace App\Http\Controllers;

use App\Models\nilais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(Request $request){
        $datanilai = DB::table('nilais')->paginate(10);
        
        return view('index',['datanilai'=>$datanilai]);
    }

    public function datanilai(){
        $nil = nilais::all();
        return view("layouts.datanilai")->with([
            'datanilai' => $nil
        ]);

    }
    public function tambah(){
        return view('layouts.tambah');
    }
    public function store(Request $request) {
        DB::table('nilais')-> insert([
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan
        ]);
        return redirect('/datanilai');
    }
    public function edit($id){
        $datanilai = DB::table('nilais')->where('id',$id)->get();
        return view ('/layouts/edit',['datanilai'=>$datanilai]);
    }
    public function update(Request $request){
        DB::table('nilais')->where('id',$request->id)->update([
            'nama'=> $request->nama,
            'nilai'=> $request->nilai,
            'keterangan'=> $request->keterangan
        ]);
        return redirect('/datanilai');
    }
    public function hapus($id){
        DB::table('nilais')->where('id',$id)->delete();

        return redirect('/datanilai');
    }
    public function search(Request $request){
        $output="";

       $nil=DB::table('nilais')->where('nama','like','%'.
       $request->search.'%')->orWhere('nilai','like','%'.
       $request->search.'%')->get();
        
       foreach($nil as $nil){
        $output.=

        '<tr>

        <td>'.$nil->id.'</td>
        <td>'.$nil->nama.'</td>
        <td>'.$nil->nilai.'</td>
        <td>'.$nil->keterangan.'</td>

        <td>'.'
            <a href="/datanilai/edit/{{$nil->id}}" class="btn btn-warning" data-bs-toggle="modal"
            data-bs-target="#exampleModal-{{$nil->id}}">'.'<i class="bi bi-pencil-square"></i></a>
            <a href="/datanilai/hapus/{{$nil->id}}" class="btn btn-danger">'.'<i class="bi bi-trash-fill"></i></a>
        '.'</td>

        </tr>';

        
       }
       return response($output);
    }
    
}

