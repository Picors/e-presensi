<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class PresensiController extends Controller
{
    public function create()
    {
        $hariini = date("Y-m-d");
        $nik = Auth::guard('karyawan')->user()->nik;
        $cek = DB::table('presensi')->where('tgl_presensi',$hariini)->where('nik',$nik)->count();
        return view('presensi.create', compact('cek'));
    }

    public function store(Request $request)
    {

        $nik = Auth::guard('karyawan')->user()->nik;
        $tgl_presensi = date("Y-m-d");
        $jam = date("H:i:s");

        $latitudekantor = -6.1607835318167465;
        $longitudekantor =  106.8630174846951;
        $lokasi = $request->lokasi;
        $lokasiuser = explode(",", $lokasi);
        $latitudeuser = $lokasiuser[0];
        $longitudeuser = $lokasiuser[1];

        $jarak =$this->distance($latitudekantor, $longitudekantor, $latitudeuser, $longitudeuser);
        $radius = round($jarak["meters"]);

        $image = $request->image;
        $folderPath = "public/uploads/absensi/";
        $formatName = $nik . "-" . $tgl_presensi;
        $image_parts = explode(";base64",$image);
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $formatName . ".png";
        $file = $folderPath . $fileName;

        $cek = DB::table('presensi')->where('tgl_presensi',$tgl_presensi)->where('nik',$nik)->count();
        if($radius > 20){
            echo "error|Maaf Anda Berada Di luar Jangkauan Radius,Jarak Anda".$radius."meter Dari Kantor|radius";
        } else {
        if($cek > 0){
            $data_pulang =
            [
                'jam_out' => $jam,
                'foto_out' => $fileName,
                'lokasi_out' => $lokasi,
            ];
            $update = DB::table('presensi')->where('tgl_presensi',$tgl_presensi)->where('nik',$nik)->update($data_pulang);
            if($update){
                echo "success|Terimakasih, Hati Hati di jalan|out";
                Storage::put($file, $image_base64);
            } else {
                echo "error|Maaf Gagal Absen Hubungi Tim IT|out";
            }
        }else {
            $data =
            [
                'nik' => $nik,
                'tgl_presensi' => $tgl_presensi,
                'jam_in' => $jam,
                'foto_in' => $fileName,
                'lokasi_in' => $lokasi,
            ];
            $simpan = DB::table('presensi')->insert($data);
                if($simpan){
                    echo "success|Terima Kaish Selamat Bekerja :)|in";
                    Storage::put($file, $image_base64);
                } else {
                    echo "error|Maaf Gagal Absen Hubungi Tim IT|in";
                }
            }
        }

    }
         //Menghitung Jarak titik kordinat
    function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('meters');
    }


    // monitoring Presensi
    public function monitoring()
    {
        return view('presensi.monitoring');
    }

    public function getpresensi(Request $request)
    {
        $tanggal = $request->tanggal;
        $presensi = DB::table('presensi')
            ->select('presensi.*', 'nama_lengkap', 'nama_dept')
            ->join('karyawan', 'presensi.nik', '=', 'karyawan.nik')
            ->join('departemen', 'karyawan.kode_dept', '=', 'departemen.kode_dept')
            ->where('tgl_presensi', $tanggal)
            ->get();
        
            return view('presensi.getpresensi', compact('presensi'));
    }
}

