<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasakanController extends Controller
{
    public function daftar()
    {
    	return view('admin.pages.masakan.daftar');
    }
}
