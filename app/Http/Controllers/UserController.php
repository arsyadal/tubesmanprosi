<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function goOnline(){
        return view('goOnline');
    }
    
    public function goModern(){
        return view('goModern');
    }
    public function goGlobal(){
        return view('goGlobal');
    }
}
