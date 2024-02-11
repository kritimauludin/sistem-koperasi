@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bayar Angsuran</h1>
        <a href="/dashboard/angsuran" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>



    <!--Update Anggota-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bayar Angsuran</h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-12">

                    <form action="/bayar/angsuran/" method="POST">
                        @csrf
                        <input type="hidden" name="pinjaman_id" id="pinjaman_id" class="form-control" id="floatingInput" required>
                        <div class="form-floating mb-3">
                            <select class="form-select anggotaSelect" id="anggotaSelect" aria-label="Anggota" name="anggota_id" onchange="show()" required>
                                <option>Open this select menu</option>
                                @foreach ($angsuran as $a)
                                    <option value="{{ $a->anggota->id }}" data-pinjamanId="{{$a->id}}" data-sisa="{{$a->sisa}}">{{ $a->anggota->nama .' - Rp.'. number_format($a->sisa)  }}</option>
                                @endforeach
                            </select>
                            <label for="anggotaSelect">Nama Anggota</label>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="sisa" id="sisa" class="form-control" id="floatingInput" placeholder="Sisa Bayar" readonly>
                                    <label for="floatingInput">Sisa Bayar</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="jumlah" class="form-control" id="floatingInput" placeholder="Jumlah Angsuran">
                                    <label for="floatingInput">Jumlah Bayar</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Bayar</button>
                    </form>

                </div>

            </div>

        </div>
    </div>

    <!--Update Anggota-->


<!-- /.container-fluid -->

<script>
    let show = () => {
      let element = document.getElementById("anggotaSelect");
      let pinjamanId = element.options[element.selectedIndex].getAttribute("data-pinjamanId");
      let sisa = element.options[element.selectedIndex].getAttribute("data-sisa");
      document.getElementById("pinjaman_id").value = pinjamanId
      document.getElementById("sisa").value = sisa
    }
  </script>

@endsection
