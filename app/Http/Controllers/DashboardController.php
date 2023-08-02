<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function dashboardadmin(){
        return view('dashboard.dashboardadmin');
    }

    // public function dashboardadmin()
    // {
    //     $hariini = date("Y-m-d");
    //     $rekappresensi = DB::table('presensi')
    //         ->selectRaw('COUNT(nik) as jmlhadir, SUM(if(jam_in > "07:00",1,0)) as jmlterlambat')
    //         ->where('tgl_presensi', $hariini)
    //         ->first();
    //     return view('dashboard.dashboardadmin',compact('rekappresensi'));
    // }
}
