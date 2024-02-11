@extends('partials.template')

@section('content')
<!-- Begin Page Content -->

    <!-- Page Heading -->
    <!--Laporan pinjaman-->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Pinjaman</h6>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-12">
                    <iframe src="/export/pinjaman" width="100%" height="670px" frameborder="0"></iframe>

                </div>

            </div>

        </div>
    </div>

    <!--Update Anggota-->


<!-- /.container-fluid -->

@endsection
