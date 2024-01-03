<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model tanamanModel
use App\Models\tanamanModel;


class TanamanController extends Controller
{
    // Method untuk menampilkan data tanaman
    public function tampilTanaman()
    {
        $dataTanaman = TanamanModel::orderBy('id_tanaman', 'ASC')->paginate(5);

        return view('halaman.view_tanaman', ['tanaman' => $dataTanaman]);
    }

    // Method untuk menambah data tanaman
    public function tambahTanaman(Request $request)
    {
        // Validasi input data
        $this->validate($request, [
            'kode_tanaman' => 'required',
            'jenis_tanaman' => 'required',
            'usia_tanaman' => 'required',
            'luas_lahan' => 'required'
        ]);

        // Simpan data tanaman
        TanamanModel::create([
            'kode_tanaman' => $request->kode_tanaman,
            'jenis_tanaman' => $request->jenis_tanaman,
            'usia_tanaman' => $request->usia_tanaman,
            'luas_lahan' => $request->luas_lahan
        ]);

        return redirect('/tanaman');
    }

    // Method untuk menghapus data tanaman
    public function hapusTanaman($id_tanaman)
    {
        $dataTanaman = TanamanModel::find($id_tanaman);
        $dataTanaman->delete();
 
        return redirect()->back();
    }

    // Method untuk mengedit data tanaman
    public function editTanaman($id_tanaman, Request $request)
    {
        // Validasi input data
        $this->validate($request, [
            'kode_tanaman' => 'required',
            'jenis_tanaman' => 'required',
            'usia_tanaman' => 'required',
            'luas_lahan' => 'required'
        ]);

        $tanaman = TanamanModel::find($id_tanaman);
        $tanaman->kode_tanaman = $request->kode_tanaman;
        $tanaman->jenis_tanaman = $request->jenis_tanaman;
        $tanaman->usia_tanaman = $request->usia_tanaman;
        $tanaman->luas_lahan = $request->luas_lahan;

        $tanaman->save();

        return redirect()->back();
    }
}
