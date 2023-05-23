<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index(){

        return view('simpanan', []);
    }
}
