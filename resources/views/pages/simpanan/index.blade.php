@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Simpanan</h1>
        <a href="/export/simpanan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Export</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Simpanan</h6>
        </div>
        <div class="card-body">


            <!---TAMBAH ANGGOTA--->
            <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addSimpanan">
                Tambah Simpanan
            </a>

            <!-- Modal -->
            <div class="modal fade" id="addSimpanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-weight: 600;" id="exampleModalLabel">Tambah Anggota</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/dashboard/simpanan/add" method="POST">
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
                                    <label for="floatingInput">Tanggal Bayar</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="pokok" class="form-control" id="floatingInput" placeholder="Simpanan Pokok">
                                    <label for="floatingInput">Simpanan Pokok</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="wajib" class="form-control" id="floatingInput" placeholder="Simpanan Wajib">
                                    <label for="floatingInput">Simpanan Wajib</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" name="sukarela" class="form-control" id="floatingInput" placeholder="Simpanan Sukarela">
                                    <label for="floatingInput">Simpanan Sukarela</label>
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
                            <th>Tanggal Bayar</th>
                            <th>Simpanan Pokok</th>
                            <th>Simpanan Wajib</th>
                            <th>Simpanan Sukarela</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($simpanan as $s)
                        <tr>
                            <td>{{ $s->anggota->nama }}</td>
                            <td>{{ $s->tgl }}</td>
                            <td>{{ $s->pokok }}</td>
                            <td>{{ $s->wajib }}</td>
                            <td>{{ $s->sukarela }}</td>
                            <td class="text-center">
                                <a href="/dashboard/update/simpanan/{{ $s->id }}"><i class="fas fa-edit"></i></a>
                              | <a href="/dashboard/delete/simpanan/{{ $s->id }}" onclick="return confirm('Yakin ingin Menghapus Data Simpanan ini?')"><i class="fas fa-trash"></i></a>
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
