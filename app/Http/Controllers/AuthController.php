<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        # Mengambil email dari form
        $email = $request->get('email');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if ($email == false) {
            return redirect(route('login', ['error' => 'Email atau password tidak valid']));
        }

        # Mengambil password dari form
        $password = $request->get('password');
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        if ($password == false) {
            return redirect(route('login', ['error' => 'Email atau password tidak valid']));
        }
        $password = hash('sha256', $password);

        # Mengambil data dari database
        $result = DB::table('tbl_user')->select(['email', 'password', 'id', 'privilege'])
            ->where('email', '=', $email)
            ->where('password', '=', $password)->first();

        if ($result) {
            # Berhasil login
            session()->put('id', $result->id);
            session()->put('email', $result->email);
            session()->put('privilege', $result->privilege);
            session()->put('login', true);
            if ($result->privilege >= 2) {
                # Jika Karyawan atau lebih tinggi
                session()->put('employeePrivilege', true);
            }
            if ($result->privilege == 3) {
                # Jika admin
                session()->put('adminPrivilege', true);
            }
            return redirect(route('index'));
        } else {
            # Login gagal
            return redirect(route('login', ['error' => 'Email atau password tidak valid (1001)']));
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect(route('index'));
    }
}
