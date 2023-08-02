<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
        public function proseslogin(Request $request)
        {

            if(Auth::guard('karyawan')->attempt(['nik' => $request->nik, 'password' => $request->password])) {
                echo "berhasil login";
                return redirect('/dashboard');
            }else {
<<<<<<< HEAD
                return redirect('/')->with(['warning'=>'nik / Password Salah']);
=======
                return redirect('/')->with(['warning'=>'Nik / Password Salah']);
>>>>>>> 59b153b6d34264805f5ea974c9d5398849b8bc3d
            }
        }
        public function proseslogout()
        {
        if(Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->logout();
            return redirect('/');
            }
        }
        public function prosesloginadmin(Request $request)
        {
            if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
                echo "berhasil login";
                return redirect('/dashboardadmin');
            }else {
                return redirect('/panel')->with(['warning'=>'email / Password Salah']);
            }
        }


}
