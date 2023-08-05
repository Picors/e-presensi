<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensihariini = DB::table('presensi')->where('nik',$nik)->where('tgl_presensi',$hariini)->first();
        return view('dashboard.dashboard',compact('presensihariini'));
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
