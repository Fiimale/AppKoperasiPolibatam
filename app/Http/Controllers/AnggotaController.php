<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\Models\anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(){

        return view('anggota', [
            "data" => anggota::data()
        ]);
    }
}
