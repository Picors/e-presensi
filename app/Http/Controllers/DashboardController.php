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
        $bulanini = date("m") * 1; //bulan agustus
        $tahunini = date("Y"); //2023
        $nik = Auth::guard('karyawan')->user()->nik;
        $presensihariini = DB::table('presensi')->where('nik',$nik)->where('tgl_presensi', $hariini)->first();
        $historibulanini = DB::table('presensi')->whereRaw('MONTH(tgl_presensi)="' . $bulanini . '"')
            ->whereRaw('YEAR(tgl_presensi)="' . $tahunini .'"')
            ->orderBy('tgl_presensi')
            ->get();

        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

        return view('dashboard.dashboard',compact('presensihariini', 'historibulanini','namabulan','bulanini','tahunini'));
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
