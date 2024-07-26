<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Query\JoinClause;

class MainController extends Controller
{
    public function index(Request $request)
    {
        // Data buku terbaru
        $data_terbaru = DB::table('tbl_buku')
            ->join('tbl_koleksi', 'tbl_buku.koleksi', '=', 'tbl_koleksi.id')
            ->select('tbl_buku.*')
            // ->selectSub('tbl_subjek.nama', 'subjek')
            ->get();
        $data = null;
        $judul = 'Online Perpustakaan Lampung';

        if ($request->has('q')) {
            // Jika ada search query
            $data = DB::table('tbl_buku')
                // ->join('tbl_subjek', 'tbl_buku.subjek', '=', 'tbl_subjek.id')
                ->select('tbl_buku.*')
                // ->selectSub('tbl_subjek.nama', 'subjek')
                ->where('judul', 'like', '%' . $request->get('q') . '%')->get();
            $judul = "Hasil Pencarian '".$request->get('q')."'";
        }else if ($request->has('f')) {
            // Jika ada search query
            $data = DB::table('tbl_buku')
                // ->join('tbl_buku', 'tbl_buku.koleksi =', 'tbl_koleksi.id')
                ->select('tbl_buku.*')
                // ->selectSub('tbl_subjek.nama', 'subjek')
                ->where('koleksi', 'like', '%' . $request->get('f') . '%')->get();
            $judul = "Koleksi ".$request->get('f');
        }
        return view('index', [
            'nav' => 0,
            'data' => $data,
            'data_terbaru' => $data_terbaru,
            'data_terpopuler' => $data_terbaru,
            'data_fiksi_terbaru' => $data_terbaru,
            'judul' => $judul,
            'success' => $request->get('success', null),
            'error' => $request->get('error', null),
        ]);
    }

    public function handle(Request $request)
    {
        if ($request->has('searchQuery')) {
            return $this->indexSearch($request);
        } elseif ($request->has('filterQuery')) {
            return $this->indexFilter($request);
        }

        return redirect()->route('index'); // Fallback action if no valid input is provided
    }

    public function indexSearch(Request $request)
    {
        $q = $request->get('searchQuery');
        // $q = filter_input(INPUT_POST, 'q', FILTER_SANITIZE_SPECIAL_CHARS);
        return redirect(route('index', ['q' => $q]));
    }

    public function indexFilter(Request $request)
    {
        $f = $request->get('filterQuery');
        return redirect(route('index', ['f' => $f]));
    }

    public function showBuku(Request $request)
    {
        $id = $request->id;
        $data = DB::table('tbl_buku')
            ->join('tbl_subjek', 'tbl_buku.subjek', '=', 'tbl_subjek.id')
            ->join('tbl_koleksi', 'tbl_buku.koleksi', '=', 'tbl_koleksi.id')
            ->select('tbl_buku.*')
            ->selectSub('tbl_subjek.nama', 'subjek')
            ->selectSub('tbl_koleksi.nama', 'koleksi')
            ->where('tbl_buku.id', $id)
            ->first();

        // Jika buku tidak ditemukan
        if ($data == null) {
            return redirect(route('index'));
        }

        // Rekomendasi Data buku terbaru
        $data_terbaru = DB::table('tbl_buku')
            ->join('tbl_subjek', 'tbl_buku.subjek', '=', 'tbl_subjek.id')
            ->select('tbl_buku.*')
            ->selectSub('tbl_subjek.nama', 'subjek')
            ->get();


        return view(
            'detail-buku',
            [
                'nav' => 2,
                'data' => $data,
                'data_terbaru' => $data_terbaru
            ]
        );
    }

    public function showEditProfile(Request $request)
    {
        if (!session('login', false)) {
            return redirect(route('login'));
        }
        $data = DB::table('tbl_user')
            ->where('id', session('id'))
            ->first();
        return view('profile', [
            "data" => $data,
            "nav" => 4,
            'success' => $request->get('success', null),
            'error' => $request->get('error', null)

        ]);
    }

    public function storeEditProfile(Request $request)
    {
        if (!session('login', false))
            return redirect(route('login'));

        $nama = $request->get('nama');
        $email = $request->get('email');
        $noTelp = $request->get('noTelp');

        DB::table('tbl_user')
            ->where('id', session('id'))
            ->update([
                'nama' => $nama,
                'email' => $email,
                'noTelp' => $noTelp,
            ]);

        return redirect(route('profile', ['success' => 'Profile Berhasil Diubah']));
    }

    public function storeChangePassword(Request $request)
    {
        if (!session('login', false))
            return redirect(route('login'));

        $newpass = $request->get('newpass');
        $confirm = $request->get('confirm');

        if ($newpass != $confirm) {
            return redirect(route('profile', ['error' => 'Password tidak sama']));
        }

        DB::table('tbl_user')
            ->where('id', session('id'))
            ->update(['password' => hash('sha256', $newpass)]);

        return redirect(route('profile', ['success' => 'Password berhasil diubah']));
    }
}
