<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
    public function index(){
        return view("index");
    }
    public function database(){
        return view("layouts.database");
    }
}
