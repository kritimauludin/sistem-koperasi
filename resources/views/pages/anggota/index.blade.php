@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Anggota</h1>
        <a href="/export/anggota" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Export</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Anggota</h6>
        </div>
        <div class="card-body">


            <!---TAMBAH ANGGOTA--->
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addAnggota">
                Tambah Anggota
            </a>

            <!-- Modal -->
            <div class="modal fade" id="addAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: 600;" id="exampleModalLabel">Tambah Anggota</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/dashboard/add/anggota" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Anggota" name="nama" required>
                                    <label for="floatingInput">Anggota</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="nik" class="form-control" id="floatingInput" placeholder="NIK" required>
                                    <label for="floatingInput">NIK</label>
                                </div>

                                <div class="mb-3">
                                    <label for="form-label" class="form-label">Jenis Kelamin</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="L" required>
                                        <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="P" required>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                      </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="Tanggal Masuk" required>
                                    <label for="floatingInput">Tanggal Masuk</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Jenis Anggota" name="jenis" required>
                                      <option disabled>Open this select menu</option>
                                      <option value="Baru">Baru</option>
                                      <option value="Lama">Lama</option>
                                    </select>
                                    <label for="floatingSelect">Jenis Anggota</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" aria-label="Kategori Usaha" name="kategori" required>
                                      <option disabled>Open this select menu</option>
                                      <option value="Makanan">Makanan</option>
                                      <option value="Minuman">Minuman</option>
                                      <option value="Sembako">Sembako</option>
                                      <option value="Jasa">Jasa</option>
                                    </select>
                                    <label for="floatingSelect">Kategori Usaha</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Alamat" id="floatingTextarea2" name="alamat" style="height: 100px" required></textarea>
                                    <label for="floatingTextarea2">Alamat</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END TAMBAH ANGGOTA-->

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Anggota</th>
                            <th>NIK</th>
                            <th>Tanggal Masuk</th>
                            <th>Jenis Anggota</th>
                            <th>Kategori Usaha</th>
                            {{-- old anak & pasangan --}}
                            {{-- <th>Anak</th>
                            <th>Pasangan</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->nik }}</td>
                                <td class="text-center">{{ $a->tgl }}</td>
                                <td class="text-center">{{ $a->jenis }}</td>
                                <td class="text-center">{{ $a->kategori }}</td>

                                {{-- old anak & pasangan --}}
                                {{-- <td class="text-center">
                                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addAnak{{ $a->id }}">
                                        Tambah
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addPasangan{{ $a->id }}">
                                        Tambah
                                    </a>
                                </td> --}}

                                <td class="text-center">
                                    <a href="/dashboard/update/anggota/{{ $a->id }}"><i class="fas fa-edit"></i></a>
                                  | <a href="/dashboard/delete/anggota/{{ $a->id }}" onclick="return confirm('Yakin ingin Menghapus Anggota ini?')"><i class="fas fa-trash"></i></a>
                                </td>

                            </tr>




            <!---TAMBAH Anak--->
            <!-- Modal -->
            <div class="modal fade" id="addAnak{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: 600;" id="exampleModalLabel">Tambah Anak | {{ $a->nama }}</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/dashboard/add/anak/{{ $a->id }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama" required>
                                    <label for="floatingInput">Nama</label>
                                </div>

                                <div class="mb-3">
                                    <label for="form-label" class="form-label">Jenjang Pendidikan</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pendidikan" id="SD" value="SD" required>
                                        <label class="form-check-label" for="SD">SD</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pendidikan" id="SMP" value="SMP" required>
                                        <label class="form-check-label" for="SMP">SMP</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pendidikan" id="SMA/SMK" value="SMA/SMK" required>
                                        <label class="form-check-label" for="SMA/SMK">SMA/SMK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pendidikan" id="Lainnya" value="Lainnya" required>
                                        <label class="form-check-label" for="Lainnya">Lainnya</label>
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="sekolah" required>
                                    <label for="floatingInput">Nama Sekolah</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END TAMBAH Anak-->


            <!---TAMBAH Pasangan--->
            <!-- Modal -->
            <div class="modal fade" id="addPasangan{{ $a->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: 600;" id="exampleModalLabel">Tambah Pasangan | {{ $a->nama }}</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/dashboard/add/pasangan/{{ $a->id }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama" required>
                                    <label for="floatingInput">Nama</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Pekerjaan" name="pekerjaan" required>
                                    <label for="floatingInput">Pekerjaan</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END TAMBAH Pasangan-->



                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->
@endsection
