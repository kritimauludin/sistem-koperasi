@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pinjaman</h1>
        <a href="/export/pinjaman" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Export</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Pinjaman</h6>
        </div>
        <div class="card-body">


            <!---TAMBAH Pinjaman--->
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addPinjaman">
                Tambah Pinjaman
            </a>

            <!-- Modal -->
            <div class="modal fade" id="addPinjaman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: 600;" id="exampleModalLabel">Tambah Anggota</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/dashboard/pinjaman/add" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <select class="form-select anggotaSelect" id="anggotaSelect" aria-label="Anggota" name="anggota_id" required>
                                      <option disabled>Open this select menu</option>
                                      @foreach ($anggota as $a)
                                        <option value="{{ $a->id }}">{{ $a->nama }}</option>
                                      @endforeach
                                    </select>
                                    <label for="anggotaSelect">Nama Anggota</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="Tanggal Bayar" required>
                                    <label for="floatingInput">Tanggal Pinjam</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="jumlah" class="form-control" id="floatingInput" placeholder="Jumlah Pinjaman" required>
                                    <label for="floatingInput">Jumlah Pinjaman</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select lamaPinjaman" id="lamaPinjaman" aria-label="Lama" name="lama" required>
                                      <option selected>Open this select menu</option>
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
                                    <input type="number" name="bunga" class="form-control" id="floatingInput" placeholder="Jumlah Bunga">
                                    <label for="floatingInput">Jumlah Bunga</label>
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
            <!--END TAMBAH Pinjaman-->





            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jumlah Pinjam</th>
                            <th>Lama Pinjaman</th>
                            <th>Bunga</th>
                            <th>Sisa Bayar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjaman as $s)
                        <tr>
                            <td>{{ $s->anggota->nama }}</td>
                            <td class="text-center">{{ $s->tgl }}</td>
                            <td class="text-center">Rp.{{ number_format($s->jumlah) }}</td>
                            <td class="text-center">{{ $s->lama }} Bulan</td>
                            <td class="text-center">Rp.{{ number_format($s->bunga) }}</td>
                            <td class="text-center">
                                @if ($s->sisa == 0)
                                    <span class="text-success">Lunas</span>
                                @else
                                    Rp.{{ number_format($s->sisa) }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($s->sisa == 0)
                                    <span class="text-success">Lunas</span>
                                @else
                                    <a href="/dashboard/update/pinjaman/{{ $s->id }}"><i class="fas fa-edit"></i></a>
                                  | <a href="/dashboard/delete/pinjaman/{{ $s->id }}" onclick="return confirm('Yakin ingin Menghapus Data Pinjaman ini?')"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->
@endsection
