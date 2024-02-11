@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pinjaman {{ $pinjaman->anggota->nama }}</h1>
        <a href="/dashboard/pinjaman" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>



    <!--Update Anggota-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Pinjaman</h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-12">

                    <form action="/update/pinjaman/{{ $pinjaman->id }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select anggotaSelect" id="anggotaSelect" aria-label="Anggota" name="anggota_id" required>
                                <option value="{{ $pinjaman->anggota_id }}">{{ $pinjaman->anggota->nama }}</option>
                              @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" @if ($pinjaman->anggota->id == $a->id)
                                    hidden
                                @endif>{{ $a->nama }}</option>
                              @endforeach
                            </select>
                            <label for="anggotaSelect">Nama Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Usaha" readonly value="{{ $pinjaman->anggota->kategori }}" disabled>
                            <label for="floatingInput">Kategori Usaha</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Anggota" value="{{ $pinjaman->anggota->jenis }}" readonly disabled>
                            <label for="floatingInput">Jenis Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alamat" id="floatingTextarea2" style="height: 100px" readonly disabled>{{ $pinjaman->anggota->alamat }}</textarea>
                            <label for="floatingTextarea2">Alamat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="Tanggal Pinjaman" value="{{ $pinjaman->tgl }}">
                            <label for="floatingInput">Tanggal Pinjaman</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="jumlah" class="form-control" id="floatingInput" placeholder="Jumlah Pinjaman" value="{{ $pinjaman->jumlah }}">
                            <label for="floatingInput">Jumlah Pinjaman</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select lamaPinjaman" id="lamaPinjaman" aria-label="Lama" name="lama" required>
                              <option value="{{ $pinjaman->lama }}">{{ $pinjaman->lama }} Bulan</option>
                              <option value="1">1 Bulan</option>
                              <option value="2">2 Bulan</option>
                              <option value="3">3 Bulan</option>
                              <option value="4">4 Bulan</option>
                              <option value="5">5 Bulan</option>
                              <option value="6">6 Bulan</option>
                              <option value="7">7 Bulan</option>
                              <option value="8">8 Bulan</option>
                              <option value="9">9 Bulan</option>
                              <option value="10">10 Bulan</option>
                            </select>
                            <label for="lamaPinjaman">Lama Pinjaman</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" name="bunga" class="form-control" id="floatingInput" placeholder="Bunga Pinjaman" value="{{ $pinjaman->bunga }}">
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
