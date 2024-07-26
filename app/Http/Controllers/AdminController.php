<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function show(Request $request)
    {
        if (!session('adminPrivilege'))
            return redirect(route('index'));
        $data = DB::table('tbl_user')
            ->select()
            ->get();
        return view('admin.data-karyawan', ['nav' => 2, 'data' => $data]);
    }

    public function showTambahKaryawan(Request $request)
    {
        if (!session('adminPrivilege'))
            return redirect(route('index'));
        return view('admin.tambah-karyawan', ['nav' => 2]);
    }

    public function storeTambahKaryawan(Request $request)
    {
        if (!session('adminPrivilege'))
            return redirect(route('index'));

        $nama = $request->get('nama');
        $email = $request->get('email');
        $noTelp = $request->get('noTelp');
        $password = $request->get('password');

        DB::table('tbl_user')
            ->where('id', session('id'))
            ->insert([
                'nama' => $nama,
                'email' => $email,
                'noTelp' => $noTelp,
                'password' => hash('sha256', $password)
            ]);

        return redirect(route('data-karyawan'));
    }

    public function hapusKaryawan(Request $request)
    {
        if (!session('adminPrivilege'))
            return redirect(route('index'));
        $id = $request->id;
        if ($id == null) {
            return redirect(route('data-karyawan'));
        }

        DB::table('tbl_user')
            ->where('id', $id)
            ->delete();

        return redirect(route('data-karyawan'));
    }
    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function resetKaryawan(Request $request)
    {
        if (!session('adminPrivilege'))
            return redirect(route('index'));

        $id = $request->id;
        if ($id == null) {
            return redirect(route('data-karyawan'));
        }


        $email = DB::table('tbl_user')->where('id', $id)->first()->email;
        $newpass = $this->randomPassword();

        DB::table('tbl_user')
            ->where('id', $id)
            ->update([
                'password' => hash('sha256', $newpass)
            ]);

        return view('admin.reset-berhasil', ['newpass' => $newpass, 'email' => $email]);
    }
}
