<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model karyawanModel
use App\Models\karyawanModel;


class karyawanController extends Controller
{
    // Method untuk menampilkan data karyawan
    public function tampilkaryawan()
    {
        $datakaryawan = karyawanModel::orderBy('id_karyawan', 'ASC')->paginate(5);

        return view('halaman.view_karyawan', ['karyawan' => $datakaryawan]);
    }


    // Method untuk menambah data karyawan
    public function tambahkaryawan(Request $request)
    {
        // Validasi input data
        $this->validate($request, [
            'nip' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required'
        ]);

        // Simpan data karyawan
        karyawanModel::create([
            'nip' => $request->nip,
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'telepon' => $request->telepon
        ]);

        return redirect('/karyawan');
    }

    // Method untuk menghapus data karyawan
    public function hapuskaryawan($id_karyawan)
    {
        $datakaryawan = karyawanModel::find($id_karyawan);
        $datakaryawan->delete();
 
        return redirect()->back();
    }

    // Method untuk mengedit data karyawan
    public function editkaryawan($id_karyawan, Request $request)
    {
        // Validasi input data
        $this->validate($request, [
            'nip' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required'
        ]);

        $karyawan = karyawanModel::find($id_karyawan);
        $karyawan->nip = $request->nip;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->telepon = $request->telepon;

        $karyawan->save();

        return redirect()->back();
    }
}
