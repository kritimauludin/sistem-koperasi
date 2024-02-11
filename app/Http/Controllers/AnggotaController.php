<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Anggota;
use App\Models\Pasangan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;
use Barryvdh\DomPDF\Facade\Pdf;

class AnggotaController extends Controller
{
    //Tampilkan Halaman Anggota
    public function index() {
        $anggota = Anggota::orderBy('created_at', 'desc')->get();
        return view('pages.anggota.index', [
            "title" => "Dashboard | Anggota",
            "link" => "anggota",
            "anggota" => $anggota
        ]);
    }

    //Action Untuk Tambah Anggota
    public function add(Request $request) {
        Anggota::create([
            "nama" => $request->nama,
            "nik" => $request->nik,
            "jeniskelamin" => $request->jeniskelamin,
            "tgl" => $request->tgl,
            "jenis" => $request->jenis,
            "kategori" => $request->kategori,
            "alamat" => $request->alamat,
        ]);

        return back()->with('success', 'Data Anggota Berhasil di Tambahkan');
    }

    //Action Untuk Update Anggota
    public function update($id,Request $request) {
        $anggota = Anggota::find($id);

        $anggota->nama = $request->nama;
        $anggota->nik = $request->nik;
        $anggota->jeniskelamin = $request->jeniskelamin;
        $anggota->tgl = $request->tgl;
        $anggota->jenis = $request->jenis;
        $anggota->kategori = $request->kategori;
        $anggota->alamat = $request->alamat;

        $anggota->update();

        return back()->with('success', 'Data Anggota Berhasil di Update');
    }

    //Action Untuk delete Anggota
    public function delete($id) {
        $anggota = Anggota::find($id);

        $anggota->delete();

        return back()->with('success', 'Data Anggota Berhasil di Hapus');
    }

    //Action Untuk Tambah Anak
    public function anak($id, Request $request) {
        $anggota = Anggota::find($id);

        Anak::create([
            "anggota_id" => $id,
            "nama" => $request->nama,
            "pendidikan" => $request->pendidikan,
            "sekolah" => $request->sekolah
        ]);

        return back()->with('success', 'Data Anak di Anggota ' . $anggota->nama . ' Berhasil di Tambahkan');
    }

    //Action Untuk Update Anak
    public function anakUpdate($id,Request $request) {
        $anggota = Anggota::find($id);

        $anak = Anak::find($id);

        $anak->nama = $request->nama;
        $anak->pendidikan = $request->pendidikan;
        $anak->sekolah = $request->sekolah;

        $anak->update();

        return back()->with('success', 'Data Anak ( ' . $anak->nama . ' ) di Anggota ' . $anggota->nama . ' Berhasil di Update');
    }

    //Action Untuk Hapus Anak
    public function anakDelete($id) {
        $anggota = Anggota::find($id);

        $anak = Anak::find($id);

        $anak->delete();

        return back()->with('success', 'Data Anak ( ' . $anak->nama . ' ) di Anggota ' . $anggota->nama . ' Berhasil di Hapus');
    }

    //Action Untuk Tambah Pasangan
    public function pasangan($id, Request $request) {
        $anggota = Anggota::find($id);

        Pasangan::create([
            "anggota_id" => $id,
            "nama" => $request->nama,
            "pekerjaan" => $request->pekerjaan,
        ]);

        return back()->with('success', 'Data Pasangan di Anggota ' . $anggota->nama . ' Berhasil di Tambahkan');
    }

    //Action Untuk Update Pasangan
    public function pasanganUpdate($id,Request $request) {
        $anggota = Anggota::find($id);

        $pasangan = Pasangan::find($id);

        $pasangan->nama = $request->nama;
        $pasangan->pekerjaan = $request->pekerjaan;

        $pasangan->update();

       return back()->with('success', 'Data Pasangan ( ' . $pasangan->nama . ' ) di Anggota ' . $anggota->nama . ' Berhasil di Update');

    }

    //Action Untuk Hapus Pasangan
    public function pasanganDelete($id) {
        $anggota = Anggota::find($id);

        $pasangan = Pasangan::find($id);

        $pasangan->delete();

        return back()->with('success', 'Data Pasangan ( ' . $pasangan->nama . ' ) di Anggota ' . $anggota->nama . ' Berhasil di Hapus');
    }

    //Tampilkan Halaman Detail
    public function detail($id) {
        $anggota = Anggota::find($id);
        $anak = Anak::where('anggota_id', $id)->get();
        $pasangan = Pasangan::where('anggota_id', $id)->get();
        return view('pages.anggota.detail', [
            "title" => "Dashboard | Anggota Detail",
            "link" => "anggota",
            "anggota" => $anggota,
            "anak" => $anak,
            "pasangan" => $pasangan
        ]);
    }

    //Anggota Export
    public function export()
    {
        return Excel::download(new AnggotaExport, 'Data_Anggota.xlsx');
    }

    //Anggota Export PDF
    public function exportPdf(){
        $dataAnggota = Anggota::select('nama', 'nik', 'jeniskelamin', 'tgl', 'jenis', 'kategori', 'alamat')->get();

        $pdf = Pdf::loadView('pages.anggota.export', [
            'headings' => ['Nama', 'NIK', 'Jenis Kelamin', 'Tanggal Masuk', 'Jenis Anggota', 'Kategori Usaha', 'Alamat'],
            'dataAnggota' => $dataAnggota
        ]);

        return $pdf->stream('Data_Anggota '.date('d-m-y').'pdf');
    }

}
