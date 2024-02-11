@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail {{ $anggota->nama }}</h1>
        <a href="/dashboard/anggota" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>



    <!--Update Anggota-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Anggota</h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-12">

                    <form action="/update/anggota/{{ $anggota->id }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Anggota" name="nama" required value="{{ $anggota->nama }}">
                            <label for="floatingInput">Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="nik" class="form-control" id="floatingInput" placeholder="NIK" value="{{ $anggota->nik }}">
                            <label for="floatingInput">NIK</label>
                        </div>

                        <div class="mb-3">
                            <label for="form-label" class="form-label">Jenis Kelamin</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="L" @if ($anggota->jeniskelamin == "L")
                                checked
                            @endif>
                                <label class="form-check-label" for="lakilaki">Laki-laki</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="P" @if ($anggota->jeniskelamin == "P")
                                checked
                            @endif>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                              </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="Tanggal Masuk" value="{{ $anggota->tgl }}">
                            <label for="floatingInput">Tanggal Masuk</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Jenis Anggota" name="jenis">
                              <option value="{{ $anggota->jenis }}">{{ $anggota->jenis }}</option>
                              <option value="Baru" @if ($anggota->jenis == "Baru")
                                hidden
                            @endif>Baru</option>
                              <option value="Lama" @if ($anggota->jenis == "Lama")
                                hidden
                            @endif>Lama</option>
                            </select>
                            <label for="floatingSelect">Jenis Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Kategori Usaha" name="kategori">
                              <option value="{{ $anggota->kategori }}">{{ $anggota->kategori }}</option>
                              <option value="Makanan" @if ($anggota->kategori == "Makanan")
                                hidden
                            @endif>Makanan</option>
                              <option value="Minuman" @if ($anggota->kategori == "Minuman")
                                hidden
                            @endif>Minuman</option>
                              <option value="Sembako" @if ($anggota->kategori == "Sembako")
                                hidden
                            @endif>Sembako</option>
                              <option value="Jasa" @if ($anggota->kategori == "Jasa")
                                hidden
                            @endif>Jasa</option>
                            </select>
                            <label for="floatingSelect">Kategori Usaha</label>
                        </div>

                        <div class="form-floating mb-3" >
                            <textarea class="form-control" placeholder="Alamat" id="floatingTextarea2" name="alamat" style="height: 100px">{{ $anggota->alamat }}</textarea>
                            <label for="floatingTextarea2">Alamat</label>
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Update</button>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <!--Update Anggota-->

    <!-- DataTales Anak -->
    {{-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Anak</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Jenjang Pendidikan</th>
                            <th>Nama Sekolah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anak as $a)
                            <tr>
                                <form action="/update/anak/{{ $a->id }}" method="POST">
                                    @csrf

                                    <td>
                                        <input type="text" class="form-control" name="nama" value="{{ $a->nama }}">
                                    </td>

                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan" @if ($a->pendidikan == "SD")
                                                checked
                                            @endif id="SD" value="SD">
                                            <label class="form-check-label" for="SD">SD</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan" @if ($a->pendidikan == "SMP")
                                            checked
                                        @endif id="SMP" value="SMP">
                                            <label class="form-check-label" for="SMP">SMP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan" @if ($a->pendidikan == "SMA/SMK")
                                            checked
                                        @endif id="SMA/SMK" value="SMA/SMK">
                                            <label class="form-check-label" for="SMA/SMK">SMA/SMK</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan" id="Lainnya" @if ($a->pendidikan == "Lainnya")
                                            checked
                                        @endif value="Lainnya">
                                            <label class="form-check-label" for="Lainnya">Lainnya</label>
                                        </div>
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="sekolah" value="{{ $a->sekolah }}">
                                    </td>

                                    <td class="text-center">
                                        <button style="border:none;background:transparent" type="submit"><i class="fas fa-edit"></i></button>
                                    | <a class="btn" href="/delete/anak/{{ $a->id }}" onclick="return confirm('Yakin ingin Menghapus Data {{ $a->nama }} di Anggota ini?')"><i class="fas fa-trash"></i></a>

                                    </td>

                                </form>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <!-- DataTales Pasangan -->
    {{-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pasangan</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasangan as $a)
                            <tr>
                                <form id="formPasangan" action="/update/pasangan/{{ $a->id }}" method="POST">
                                    @csrf

                                    <td>
                                        <input type="text" class="form-control" name="nama" value="{{ $a->nama }}">
                                    </td>

                                    <td>
                                        <input type="text" class="form-control" name="pekerjaan" value="{{ $a->pekerjaan }}">
                                    </td>


                                    <td class="text-center">
                                        <button style="border:none;background:transparent" type="submit"><i class="fas fa-edit"></i></button>
                                    |  <a class="btn" href="/delete/pasangan/{{ $a->id }}" onclick="return confirm('Yakin ingin Menghapus Data {{ $a->nama }} di Anggota ini?')"><i class="fas fa-trash"></i></a>

                                    </td>

                                </form>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

<!-- /.container-fluid -->

@endsection
