@extends('index')
@section('title', 'Tanaman Sawit')

@section('isihalaman')
    <h3><center>Daftar Tanaman Sawit</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTanamanTambah"> 
        Tambah Data Tanaman 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th align="center">No</th>
                <th align="center">ID Tanaman</th>
                <th align="center">Kode Tanaman</th>
                <th align="center">Jenis Tanaman</th>
                <th align="center">Usia Tanaman</th>
                <th align="center">Luas Lahan</th>
                <th align="center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tanaman as $index => $t)
                <tr>
                    <td align="center" scope="row">{{ $index + $tanaman->firstItem() }}</td>
                    <td>{{ $t->id_tanaman }}</td>
                    <td>{{ $t->kode_tanaman }}</td>
                    <td>{{ $t->jenis_tanaman }}</td>
                    <td>{{ $t->usia_tanaman }}</td>
                    <td>{{ $t->luas_lahan }}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTanamanEdit{{ $t->id_tanaman }}"> 
                            Edit
                        </button>
                         <!-- Awal EDIT data Tanaman -->
                        <div class="modal fade" id="modalTanamanEdit{{ $t->id_tanaman }}" tabindex="-1" role="dialog" aria-labelledby="modalTanamanEditLabel" aria-hidden="true">
                            <!-- Form edit data tanaman -->
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTanamanEditLabel">Form Edit Data Tanaman</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="formTanamanEdit" id="formTanamanEdit" action="/tanaman/edit/{{ $t->id_tanaman }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="kode_tanaman" class="col-sm-4 col-form-label">Kode Tanaman</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kode_tanaman" name="kode_tanaman" value="{{ $t->kode_tanaman }}" placeholder="Masukkan Kode Tanaman">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jenis_tanaman" class="col-sm-4 col-form-label">Jenis Tanaman</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis_tanaman" name="jenis_tanaman" value="{{ $t->jenis_tanaman }}" placeholder="Masukkan Jenis Tanaman">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="usia_tanaman" class="col-sm-4 col-form-label">Usia Tanaman</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="usia_tanaman" name="usia_tanaman" value="{{ $t->usia_tanaman }}" placeholder="Masukkan Usia Tanaman">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="luas_lahan" class="col-sm-4 col-form-label">Luas Lahan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" value="{{ $t->luas_lahan }}" placeholder="Masukkan Luas Lahan">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir EDIT data Tanaman -->
                        </div>
                        <!-- Hapus data Tanaman -->
                        <a href="/tanaman/hapus/{{ $t->id_tanaman }}" onclick="return confirm('Yakin mau dihapus?')">
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
    Jumlah Data : {{ $tanaman->total() }} <br />
    Data Per Halaman : {{ $tanaman->perPage() }} <br />

    {{ $tanaman->links() }}
    <!--akhir pagination-->

    <!-- Awal tambah data Tanaman -->
    <div class="modal fade" id="modalTanamanTambah" tabindex="-1" role="dialog" aria-labelledby="modalTanamanTambahLabel" aria-hidden="true">
        <!-- Form tambah data Tanaman -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTanamanTambahLabel">Form Input Data Tanaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="formTanamanTambah" id="formTanamanTambah" action="/tanaman/tambah" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="kode_tanaman" class="col-sm-4 col-form-label">Kode Tanaman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kode_tanaman" name="kode_tanaman" placeholder="Masukkan Kode Tanaman">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_tanaman" class="col-sm-4 col-form-label">Jenis Tanaman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="jenis_tanaman" name="jenis_tanaman" placeholder="Masukkan Jenis Tanaman">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="usia_tanaman" class="col-sm-4 col-form-label">Usia Tanaman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="usia_tanaman" name="usia_tanaman" placeholder="Masukkan Usia Tanaman">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="luas_lahan" class="col-sm-4 col-form-label">Luas Lahan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Masukkan Luas Lahan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Akhir tambah data Tanaman -->
    </div>
    
@endsection
