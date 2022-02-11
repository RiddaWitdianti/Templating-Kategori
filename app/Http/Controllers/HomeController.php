<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['nomor']="NOMOR 1";
        $data['nomorTest']="NOMOR 2";
        return View('home', $data);
    }
}
