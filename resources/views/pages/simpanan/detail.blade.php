@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Simpanan {{ $simpanan->anggota->nama }}</h1>
        <a href="/dashboard/simpanan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>



    <!--Update Anggota-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Simpanan</h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-12">

                    <form action="/update/simpanan/{{ $simpanan->id }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select anggotaSelect" id="anggotaSelect" aria-label="Anggota" name="anggota_id" required>
                                <option value="{{ $simpanan->anggota_id }}">{{ $simpanan->anggota->nama }}</option>
                              @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" @if ($simpanan->anggota->id == $a->id)
                                    hidden
                                @endif>{{ $a->nama }}</option>
                              @endforeach
                            </select>
                            <label for="anggotaSelect">Nama Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Kategori Usaha" readonly value="{{ $simpanan->anggota->kategori }}" disabled>
                            <label for="floatingInput">Kategori Usaha</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Jenis Anggota" value="{{ $simpanan->anggota->jenis }}" readonly disabled>
                            <label for="floatingInput">Jenis Anggota</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Alamat" id="floatingTextarea2" style="height: 100px" readonly disabled>{{ $simpanan->anggota->alamat }}</textarea>
                            <label for="floatingTextarea2">Alamat</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="Tanggal Bayar" value="{{ $simpanan->tgl }}">
                            <label for="floatingInput">Tanggal Bayar</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Simpanan Pokok" id="floatingTextarea2" name="pokok" style="height: 100px">{{ $simpanan->pokok }}</textarea>
                            <label for="floatingTextarea2">Simpanan Pokok</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Simpanan Wajib" id="floatingTextarea2" name="wajib" style="height: 100px">{{ $simpanan->wajib }}</textarea>
                            <label for="floatingTextarea2">Simpanan Wajib</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Simpanan Sukarela" id="floatingTextarea2" name="sukarela" style="height: 100px">{{ $simpanan->sukarela }}</textarea>
                            <label for="floatingTextarea2">Simpanan Sukarela</label>
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
