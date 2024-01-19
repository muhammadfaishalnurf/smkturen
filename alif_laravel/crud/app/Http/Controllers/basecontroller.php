<?php

namespace App\Http\Controllers;

use App\Models\perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class basecontroller extends Controller
{
    public function index(Request $request){
        $database = DB::table('perpustakaans')->paginate(10);
        
        return view('index',['database'=>$database]);
    }

    public function database(){
        $perpus = perpustakaan::all();
        return view("layouts.database")->with([
            'database' => $perpus
        ]);

    }
    public function tambah(){
        return view('layouts.tambah');
    }
    public function store(Request $request) {
        DB::table('perpustakaans')-> insert([
            'judul' => $request->judul,
            'jml_buku' => $request->jml_buku,
            'kode_buku' => $request->kode_buku
        ]);
        return redirect('/database');
    }
    public function edit($id){
        $database = DB::table('perpustakaans')->where('id',$id)->get();
        return view ('/layouts/edit',['database'=>$database]);
    }
    public function update(Request $request){
        DB::table('perpustakaans')->where('id',$request->id)->update([
            'judul'=> $request->judul,
            'jml_buku'=> $request->jml_buku,
            'kode_buku'=> $request->kode_buku
        ]);
        return redirect('/database');
    }
    public function hapus($id){
        DB::table('perpustakaans')->where('id',$id)->delete();

        return redirect('/database');
    }
    public function search(Request $request){
        $output="";

       $perpus=DB::table('perpustakaans')->where('judul','like','%'.
       $request->search.'%')->orWhere('jml_buku','like','%'.
       $request->search.'%')->get();
        
       foreach($perpus as $perpus){
        $output.=

        '<tr>

        <td>'.$perpus->id.'</td>
        <td>'.$perpus->judul.'</td>
        <td>'.$perpus->jml_buku.'</td>
        <td>'.$perpus->kode_buku.'</td>

        <td>'.'
            <a href="/database/edit/{{$perpus->id}}" class="btn btn-warning" data-bs-toggle="modal"
            data-bs-target="#exampleModal-{{$perpus->id}}">'.'<i class="bi bi-pencil-square"></i></a>
            <a href="/database/hapus/{{$perpus->id}}" class="btn btn-danger">'.'<i class="bi bi-trash-fill"></i></a>
        '.'</td>

        </tr>';

        
       }
       return response($output);
    }
    
}

