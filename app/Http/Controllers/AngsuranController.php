<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AngsuranExport;
use App\Models\Anggota;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    //Tampilkan Halaman Angsuran
    public function index() {
        $anggota = Anggota::all();
        $angsuran = Angsuran::orderBy('sisa', 'asc')->get();
        return view('pages.angsuran.index', [
            "title" => "Dashboard | Angsuran",
            "link" => "angsuran",
            "anggota" => $anggota,
            "angsuran" => $angsuran
        ]);
    }

    //Action Tambah Data Angsuran
    public function add(Request $request) {
        $jumlahAll = 0;
        $jumlahAll = $request->jumlah + $request->bunga;
        //Jika Jumlah Angsuran Belum Lunas Maka Tidak Boleh Menambahkan Angsuran ke anggota_id yang sama
        $anggota = Anggota::find($request->anggota_id);
        // Mengecek apakah jumlah angsuran belum lunas
        if ($anggota && $anggota->angsuran()->where('jumlah', '>', 0)->exists()) {
            // Jika ada angsuran dengan jumlah yang lebih besar dari 0
            return back()->with('error', 'Angsuran belum lunas. Tidak dapat menambahkan angsuran lagi.');
        }

        Angsuran::create([
            "anggota_id" => $request->anggota_id,
            "jumlah" => $jumlahAll,
            "lama" => $request->lama,
            "bunga" => $request->bunga,
        ]);

        return back()->with('success', 'Data Angsuran Berhasil di Tambahkan');
    }

    //Action update
    public function update($id,Request $request) {
        $angsuran = Angsuran::find($id);

        $awal = $angsuran->jumlah * 0;

        $angsuran->jumlah = $awal;

        $angsuran->update();

        $angsuran->anggota_id = $request->anggota_id;
        $angsuran->lama = $request->lama;
        $totAll = 0;
        $totAll = $request->jumlah + $request->bunga;
        $angsuran->jumlah = $totAll;
        $angsuran->bunga = $request->bunga;

        $angsuran->update();

        return back()->with('success', 'Data Angsuran ' . $angsuran->anggota->nama . ' Berhasil di Update');
    }

    public function delete($id) {
        $angsuran = Angsuran::find($id);

        $angsuran->delete();

        return back()->with('success', 'Data Angsuran ' . $angsuran->anggota->nama . ' Berhasil di Update');
    }
    //Halaman Update Data
    public function updatePages($id) {
        $anggota = Anggota::all();
        $angsuran = Angsuran::find($id);
        return view('pages.angsuran.detail', [
            "title" => "Dashboard | Update Angsuran" . $angsuran->anggota->nama,
            "link" => "angsuran",
            "angsuran" => $angsuran,
            "anggota" => $anggota
        ]);
    }

     //Halaman Bayar Angsuran
     public function bayar() {
        $anggota = Anggota::all();
        $angsuran = Pinjaman::where('sisa', '!=', 0)->get();
        return view('pages.angsuran.bayar', [
            "title" => "Dashboard | Bayar Angsuran",
            "link" => "bayar",
            "angsuran" => $angsuran,
            "anggota" => $anggota
        ]);
    }

    //Bayar Angsuran
    public function pay(Request $request) {
        $anggotaId = $request->anggota_id;
        $pinjamanId = $request->pinjaman_id;
        $angsuranKe = Angsuran::where('anggota_id', $anggotaId)->where('pinjaman_id',$pinjamanId)->count() + 1;
        $updateSisaBayar = $request->sisa - $request->jumlah;

        // Menetapkan bahwa jumlah tidak boleh menjadi minus
        if ($updateSisaBayar < 0) {

            return back()->with('error', 'Pembayaran Gagal');
        } else {
            $dataAngsuran = [
                'anggota_id' => $anggotaId,
                'pinjaman_id'=> $pinjamanId,
                'lama' => $angsuranKe,
                'sisa' => $updateSisaBayar,
                'jumlah' => $request->jumlah
            ];

            $updatePinjaman = [
                'sisa' => $updateSisaBayar
            ];

            Angsuran::create($dataAngsuran);
            Pinjaman::where('id', $pinjamanId)->update($updatePinjaman);
            return redirect('/dashboard/angsuran')->with('success', 'Pembayaran Angsuran ke-'.$angsuranKe.' Berhasil');
        }

    }

    //Angsuran Export
    public function export()
    {
        return Excel::download(new AngsuranExport, 'Data_Angsuran.xlsx');
    }

    //Angsuran Export PDF
    public function exportPdf(){

        $pdf = Pdf::loadView('pages.angsuran.export', [
            'angsurans' => Angsuran::all(),
            'headings' => ['Nama Anggota', 'Kategori Usaha', 'Jenis Anggota', 'Alamat', 'Angsuran Ke', 'Jumlah Bayar', 'Sisa', 'Keterangan Lunas'],
        ]);

        return $pdf->stream('Data_Angsuran '.date('d-m-y').'pdf');
    }
}
