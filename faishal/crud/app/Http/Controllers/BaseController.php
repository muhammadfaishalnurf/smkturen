<?php

namespace App\Http\Controllers;

use App\Models\perpustakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{


    public function index(){
        return view('index');
    }
    

   
    public function database(){
        $perpus = perpustakaan::all();
        return view("layouts.database")->with([
            'data' => $perpus
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

    public function update(Request $request){
        //update data
        DB::table('perpustakaans')->where('id',$request->id)->update([
            'judul'=> $request->judul,
            'jml_buku'=> $request->jml_buku,
            'kode_buku'=> $request->kode_buku
        ]);
        return redirect('/database');
    }

    public function hapus($id)
    {
        //menghapus data
        DB::table('perpustakaans')->where('id',$id)->delete();

        return redirect('/database');
    }

    public function search(Request $request)
    {

        $output='';
        $per=DB::table('perpustakaans')->where('judul','like','%'.$request->
        search.'%')->orWhere('kode_buku','like','%'.$request->
        search.'%')->get();
        

        foreach($per as $pers)
        {
            $output.= 
            '<tr>
                <td> '.$pers->id.' </td>
                <td> '.$pers->judul.' </td>
                <td> '.$pers->jml_buku.' </td>
                <td> '.$pers->kode_buku.' </td>

                <td>'.'
                <a href="/database/update/'.$pers->id.'" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal'.$pers->id.'">'.'<i class="bi bi-pencil-square"></i></a>
                <a href="/database/hapus/'.$pers->id.'" class="btn btn-danger">'.'<i class="bi bi-trash-fill"></i></a>
                '.'</td>
            </tr>';
        }
        return response($output);

    }

    
    
}
