<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $query = Karyawan::query();
        $query->select('karyawan.*', 'nama_dept');
        $query->join('departemen','karyawan.kode_dept', '=', 'departemen.kode_dept');
        $query->orderBy('nama_lengkap');
        if (!empty($request->nama_lengkap)){
            $query->where('nama_lengkap', 'like', '%' . $request->nama_lengkap . '%');
        }
        if (!empty($request->kode_dept)){
            $query->where('karyawan.kode_dept', $request->kode_dept);
        }
        $karyawan = $query->paginate(10);

        $departemen = DB::table('departemen')->get();
        return view('karyawan.index', compact('karyawan', 'departemen'));
    }

    public function store(Request $request)
    {
        $nik = $request->nik;
        $nama_lengkap = $request->nama_lengkap;
        $jabatan = $request->jabatan;
        $no_hp = $request->no_hp;
        $kode_dept = $request->kode_dept;
        $password = Hash::make('12345');
        if ($request->hasFile('foto')){
            $foto = $nik . '.' . $request->file('foto')->getClientOriginalExtension();
        } else {
            $foto = null; 
        }

        try {
            $data = [
                'nik' => $nik,
                'nama_lengkap' => $nama_lengkap,
                'jabatan' => $jabatan,
                'no_hp' => $no_hp,
                'foto' => $foto,
                'password'=> $password,
                'kode_dept' => $kode_dept
            ];
            $simpan = DB::table('karyawan')->insert($data);

            if($simpan){
                if ($request->hasFile('foto')) {
                    $folderPath = "public/uploads/karyawan/";
                    $request->file('foto')->storeAs($folderPath, $foto); 
                }
                return Redirect::back()->with(['success'=> 'Data Berhasil Disimpan']);
            }
        } catch (\Exception $e) {

            return Redirect::back()->with(['warning'=> 'Data Gagal Disimpan']);

        }
    }
}
?>
