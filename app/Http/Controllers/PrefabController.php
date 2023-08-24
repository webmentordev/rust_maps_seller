<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrefabController extends Controller
{
    public function index(){
        return view('prefabs');
    }
}
