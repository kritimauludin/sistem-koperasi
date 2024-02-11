@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Angsuran</h1>
        <a href="/export/angsuran" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Export</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Angsuran</h6>
        </div>
        <div class="card-body">


            <!---TAMBAH ANGGOTA--->
            <a href="/dashboard/angsuran/bayar" class="btn btn-primary mb-2">
                Bayar Angsuran
            </a>

            <!-- Modal -->
            <div class="modal fade" id="addAngsuran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: 600;" id="exampleModalLabel">Tambah Anggota</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/dashboard/angsuran/add" method="POST">
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
                                    <input type="number" name="jumlah" class="form-control" id="floatingInput" placeholder="Jumlah Angsuran" required>
                                    <label for="floatingInput">Jumlah Angsuran</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select lamaPinjaman" id="lamaPinjaman" aria-label="Lama" name="lama" required>
                                      <option selected>Open this select menu</option>
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
            <!--END TAMBAH ANGGOTA-->

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Anggota</th>
                            <th>Angsuran Ke</th>
                            <th>Total bayar</th>
                            <th>Sisa bayar</th>
                            <th>Keterangan</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($angsuran as $s)
                        <tr >
                            <td>{{ $s->anggota->nama }}</td>
                            <td class="text-center">{{ $s->lama }}</td>
                            <td class="text-center">Rp.{{ number_format($s->jumlah) }}</td>
                            <td class="text-center">Rp.{{ number_format($s->sisa) }}</td>
                            <td class="text-center">@if ($s->sisa == 0)
                                <span class="text-success">Lunas</span> @else Pembayaran ke-{{ $s->lama }}, <span class="text-warning">Belum Lunas</span>
                            @endif</td>
                            {{-- <td class="text-center">
                                <a href="/dashboard/update/angsuran/{{ $s->id }}"><i class="fas fa-edit"></i></a>
                              | <a href="/dashboard/delete/angsuran/{{ $s->id }}" onclick="return confirm('Yakin ingin Menghapus Data Angsuran ini?')"><i class="fas fa-trash"></i></a>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- /.container-fluid -->
@endsection
