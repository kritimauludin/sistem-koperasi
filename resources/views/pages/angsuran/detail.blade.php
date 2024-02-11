@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Angsuran {{ $angsuran->anggota->nama }}</h1>
        <a href="/dashboard/angsuran" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>



    <!--Update Anggota-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Angsuran</h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-12">

                    <form action="/update/angsuran/{{ $angsuran->id }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select anggotaSelect" id="anggotaSelect" aria-label="Anggota" name="anggota_id" required>
                                <option value="{{ $angsuran->anggota_id }}">{{ $angsuran->anggota->nama }}</option>
                              @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" @if ($angsuran->anggota->id == $a->id)
                                    hidden
                                @endif>{{ $a->nama }}</option>
                              @endforeach
                            </select>
                            <label for="anggotaSelect">Nama Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Usaha" readonly value="{{ $angsuran->anggota->kategori }}" disabled>
                            <label for="floatingInput">Kategori Usaha</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Anggota" value="{{ $angsuran->anggota->jenis }}" readonly disabled>
                            <label for="floatingInput">Jenis Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alamat" id="floatingTextarea2" style="height: 100px" readonly disabled>{{ $angsuran->anggota->alamat }}</textarea>
                            <label for="floatingTextarea2">Alamat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="jumlah" class="form-control" id="floatingInput" placeholder="Jumlah Angsuran" value="{{ $angsuran->jumlah }}">
                            <label for="floatingInput">Jumlah Angsuran</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select lamaPinjaman" id="lamaPinjaman" aria-label="Lama" name="lama" required>
                              <option value="{{ $angsuran->lama }}">{{ $angsuran->lama }}</option>
                              <option value="1 Bulan">1 Bulan</option>
                              <option value="2 Bulan">2 Bulan</option>
                              <option value="3 Bulan">3 Bulan</option>
                              <option value="4 Bulan">4 Bulan</option>
                              <option value="5 Bulan">5 Bulan</option>
                              <option value="6 Bulan">6 Bulan</option>
                              <option value="7 Bulan">7 Bulan</option>
                              <option value="8 Bulan">8 Bulan</option>
                              <option value="9 Bulan">9 Bulan</option>
                              <option value="10 Bulan">10 Bulan</option>
                            </select>
                            <label for="lamaPinjaman">Lama Pinjaman</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="bunga" class="form-control" id="floatingInput" placeholder="Bunga Pinjaman" value="{{ $angsuran->bunga }}">
                            <label for="floatingInput">Bunga Pinjaman</label>
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Update</button>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <!--Update Anggota-->


<!-- /.container-fluid -->

@endsection
