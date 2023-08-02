<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        return view('dasboard.dasboard');
    }

    public function dashboardadmin(){
        return view('dashboardadmin');
    }
}
