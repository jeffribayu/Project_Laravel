@extends('index')
@section('title', 'Karyawan')

@section('isihalaman')
    <h3><center>Daftar Karyawan Perusahaan Sawit</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKaryawanTambah"> 
        Tambah Data Karyawan 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Karyawan</td>
                <td align="center">NIP</td>
                <td align="center">Nama Karyawan</td>
                <td align="center">Jabatan</td>
                <td align="center">Telepon</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($karyawan as $index=>$k)
                <tr>
                    <td align="center" scope="row">{{ $index + $karyawan->firstItem() }}</td>
                    <td>{{$k->id_karyawan}}</td>
                    <td>{{$k->nip}}</td>
                    <td>{{$k->nama_karyawan}}</td>
                    <td>{{$k->jabatan}}</td>
                    <td>{{$k->telepon}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalkaryawanEdit{{$k->id_karyawan}}"> 
                            Edit
                        </button>
                         <!-- Awal EDIT data karyawan -->
                        <div class="modal fade" id="modalkaryawanEdit{{$k->id_karyawan}}" tabindex="-1" role="dialog" aria-labelledby="modalkaryawanEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalkaryawanEditLabel">Form Edit Data karyawan</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form name="formkaryawanedit" id="formkaryawanedit" action="/karyawan/edit/{{ $k->id_karyawan }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ $k->nama_karyawan }}" placeholder="Masukkan Nama karyawan">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $k->telepon }}" placeholder="Masukkan Nomor Telepon">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="karyawanedit" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir EDIT data karyawan -->

                        |
                        <a href="/karyawan/hapus/{{ $k->id_karyawan }}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->

    Jumlah Data : {{ $karyawan->total() }} <br />
    Data Per Halaman : {{ $karyawan->perPage() }} <br />

    {{ $karyawan->links() }}
    <!--akhir pagination-->

<!-- Awal tambah data karyawan -->
<div class="modal fade" id="modalKaryawanTambah" tabindex="-1" role="dialog" aria-labelledby="modalKaryawanTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKaryawanTambahLabel">Form Input Data Karyawan</h5>
            </div>
            <div class="modal-body">
                <form name="formkaryawantambah" id="formkaryawantambah" action="/karyawan/tambah" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukkan Nama Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Karyawan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hp" class="col-sm-4 col-form-label">Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan Nomor Telepon">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="karyawantambah" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir tambah data karyawan -->
    
@endsection
