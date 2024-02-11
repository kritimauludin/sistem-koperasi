<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PinjamanExport;
use App\Models\Anggota;
use App\Models\Pinjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    //Tampilkan Halaman Pinjaman
    public function index() {
        $anggota = Anggota::all();
        $pinjaman = Pinjaman::orderBy('created_at', 'desc')->get();
        return view('pages.pinjaman.index', [
            "title" => "Dashboard | Pinjaman",
            "link" => "pinjaman",
            "anggota" => $anggota,
            "pinjaman" => $pinjaman
        ]);
    }

    //Action Tambah Data Pinjaman
    public function add(Request $request) {
        Pinjaman::create([
            "anggota_id" => $request->anggota_id,
            "tgl" => $request->tgl,
            "jumlah" => $request->jumlah,
            "lama" => $request->lama,
            "bunga" => $request->bunga,
        ]);

        return back()->with('success', 'Data Pinjaman Berhasil di Tambahkan');
    }

    //Action update
    public function update($id,Request $request) {
        $pinjaman = Pinjaman::find($id);


        $pinjaman->anggota_id = $request->anggota_id;
        $pinjaman->tgl = $request->tgl;
        $pinjaman->jumlah = $request->jumlah;
        $pinjaman->lama = $request->lama;
        $pinjaman->bunga = $request->bunga;

        $pinjaman->update();

        return back()->with('success', 'Data Pinjaman ' . $pinjaman->anggota->nama . ' Berhasil di Update');
    }

    public function delete($id) {
        $pinjaman = Pinjaman::find($id);

        $pinjaman->delete();

        return back()->with('success', 'Data Pinjaman ' . $pinjaman->anggota->nama . ' Berhasil di Update');
    }

    //Halaman Update Data
    public function updatePages($id) {
        $anggota = Anggota::all();
        $pinjaman = Pinjaman::find($id);
        return view('pages.pinjaman.detail', [
            "title" => "Dashboard | Update Pinjaman" . $pinjaman->anggota->nama,
            "link" => "pinjaman",
            "pinjaman" => $pinjaman,
            "anggota" => $anggota
        ]);
    }

    //Pinjaman Export
    public function export()
    {
        return Excel::download(new PinjamanExport, 'Data_Pinjaman.xlsx');
    }

    //Pinjaman Export PDF
    public function exportPdf(){

        $pdf = Pdf::loadView('pages.pinjaman.export', [
            'pinjamans' => Pinjaman::all(),
            'headings' => ['Nama Anggota', 'Kategori Usaha', 'Jenis Anggota', 'Alamat', 'Tanggal Pinjaman', 'Jumlah Pinjaman', 'Lama pinjaman', 'Bunga'],
        ]);

        return $pdf->stream('Data_Pinjaman '.date('d-m-y').'pdf');
    }
}
