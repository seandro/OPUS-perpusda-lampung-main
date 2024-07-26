<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    public function show(Request $request)
    {
        if (!session('employeePrivilege'))
            return redirect(route('index'));

        $data = DB::table('tbl_buku')
            ->select(['*']);

        return view(
            'karyawan.data-buku',
            [
                'nav' => 1,
                'container' => $data->get()
            ]
        );
    }

    public function showTambahBuku(Request $request)
    {
        if (!session('employeePrivilege'))
            return redirect(route('index'));
        return view('karyawan.tambah-buku', ['nav' => 1]);
    }

    public function tambahBuku(Request $request)
    {
        if (!session('employeePrivilege'))
            return redirect(route('index'));

        // Data dari form
        $ISBN = $request->get('ISBN');
        $judul = $request->get('judul');
        $pengarang = $request->get('pengarang');
        $penerbit = $request->get('penerbit');
        $tahunTerbit = $request->get('tahunTerbit');
        $jumlah = $request->get('jumlah');
        $subjek = $request->get('subjek');
        $koleksi = $request->get('koleksi');

        // Cover buku
        $file_cover = $request->file('cover-buku');
        // Upload foto
        if ($file_cover != null)
            $file_cover->storePubliclyAs('cover_buku', $ISBN . '.jpeg', 'public');

        // Upload ke database 
        DB::table('tbl_buku')->insert([
            'judul' => $judul,
            'pengarang' => $pengarang,
            'penerbit' => $penerbit,
            'tahun' => $tahunTerbit,
            'ISBN' => $ISBN,
            'jumlah' => $jumlah,
            'koleksi' => $koleksi,
            'subjek' => $subjek,
            'inputBy' => session('id'),
        ]);

        return redirect(route('data-buku'));
    }

    public function hapusBuku(Request $request)
    {
        if (!session('employeePrivilege'))
        return redirect(route('index'));
        $id = $request->id;
        DB::table('tbl_buku')
            ->where('id', $id)
            ->delete();
        return redirect(route('data-buku'));
    }

    public function showEditBuku(Request $request)
    {
        if (!session('employeePrivilege'))
        return redirect(route('index'));
        $id = $request->id;
        $data = DB::table('tbl_buku')
            ->where('id', $id)
            ->first();
        return view('karyawan.edit-buku', ['nav' => 1, 'data' => $data]);
    }
    public function storeEditBuku(Request $request)
    {
        if (!session('employeePrivilege'))
        return redirect(route('index'));
        $id = $request->id;

        
        // Data dari form
        $ISBN = $request->get('ISBN');
        $judul = $request->get('judul');
        $pengarang = $request->get('pengarang');
        $penerbit = $request->get('penerbit');
        $tahunTerbit = $request->get('tahunTerbit');
        $jumlah = $request->get('jumlah');
        $subjek = $request->get('subjek');
        $koleksi = $request->get('koleksi');

        // Cover buku
        $file_cover = $request->file('cover-buku');
        // Upload foto
        if ($file_cover != null)
            $file_cover->storePubliclyAs('cover_buku', $ISBN . '.jpeg', 'public');

        // Upload ke database 
        DB::table('tbl_buku')
            ->where('id', $id)
            ->update([
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun' => $tahunTerbit,
                'ISBN' => $ISBN,
                'jumlah' => $jumlah,
                'koleksi' => $koleksi,
                'subjek' => $subjek,
                'inputBy' => session('id'),
            ]);
        return redirect(route('data-buku'));
    }
}