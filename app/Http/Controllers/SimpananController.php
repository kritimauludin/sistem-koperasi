<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SimpananExport;
use App\Models\Anggota;
use App\Models\Simpanan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    //Tampilkan Halaman Simpanan
    public function index() {
        $anggota = Anggota::all();
        $simpanan = Simpanan::orderBy('created_at', 'desc')->get();
        return view('pages.simpanan.index', [
            "title" => "Dashboard | Simpanan",
            "link" => "simpanan",
            "simpanan" => $simpanan,
            "anggota" => $anggota
        ]);
    }

    //Action Tambah Data Simpanan
    public function add(Request $request) {
        Simpanan::create([
            "anggota_id" => $request->anggota_id,
            "tgl" => $request->tgl,
            "pokok" => $request->pokok,
            "wajib" => $request->wajib,
            "sukarela" => $request->sukarela,
        ]);

        return back()->with('success', 'Data Simpanan Berhasil di Tambahkan');
    }

    //Action update
    public function update($id,Request $request) {
        $simpanan = Simpanan::find($id);


        $simpanan->anggota_id = $request->anggota_id;
        $simpanan->tgl = $request->tgl;
        $simpanan->pokok = $request->pokok;
        $simpanan->wajib = $request->wajib;
        $simpanan->sukarela = $request->sukarela;

        $simpanan->update();

        return back()->with('success', 'Data Simpanan ' . $simpanan->anggota->nama . ' Berhasil di Update');
    }

    //Action Delete
    public function delete($id) {
        $simpanan = Simpanan::find($id);

        $simpanan->delete();

        return back()->with('success', 'Data Simpanan ' . $simpanan->anggota->nama . ' Berhasil di Hapus');
    }

    //Halaman Update Data
    public function updatePages($id) {
        $anggota = Anggota::all();
        $simpanan = Simpanan::find($id);
        return view('pages.simpanan.detail', [
            "title" => "Dashboard | Update Simpanan" . $simpanan->anggota->nama,
            "link" => "simpanan",
            "simpanan" => $simpanan,
            "anggota" => $anggota
        ]);
    }

    //Simpanan Export
    public function export()
    {
        return Excel::download(new SimpananExport, 'Data_Simpanan.xlsx');
    }

    //Simpanan Export PDF
    public function exportPdf(){

        $pdf = Pdf::loadView('pages.simpanan.export', [
            'simpanans' => Simpanan::all(),
            'headings' => ['Nama Anggota', 'Kategori Usaha', 'Jenis Anggota', 'Alamat', 'Tanggal dibayar', 'Simpanan Pokok', 'Simpanan Wajib', 'Simpanan Sukarela'],
        ]);

        return $pdf->stream('Data_Simpanan '.date('d-m-y').'pdf');
    }

}
