<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Tampilkan Halaman Dashboard
    public function index() {
        //Jumlahkan Semua Table Anggota
        $anggotaCount = Anggota::count();
        $angsuranCount = Angsuran::count();
        $simpananCount = Simpanan::count();
        $pinjamanCount = Pinjaman::count();


        $anggotaBaruCount = Anggota::where('jenis', 'Baru')->count();
        $anggotaLamaCount = $anggotaCount - $anggotaBaruCount;

        // Hitung jumlah simpanan
       // Ambil data simpanan
       $simpananDatas = Simpanan::all();

        // Hitung total pokok, wajib, dan sukarela
        foreach ($simpananDatas as $simpananData) {
            $totalPokok = $simpananData::count('pokok');
            $totalWajib = $simpananData::count('wajib');
            $totalSukarela = $simpananData::count('sukarela');
        }

        //Chart Pinjaman
        $pinjamans = Pinjaman::all();
        $monthlyData = [];

        foreach ($pinjamans as $pinjaman) {
            $month = date('n', strtotime($pinjaman->tgl));
            $monthlyData[$month][] = $pinjaman->jumlah;
        }

        $monthlySums = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthlySums[$i] = isset($monthlyData[$i]) ? array_sum($monthlyData[$i]) : 0;
        }

        // Tampil halaman index
        $data = [
            "title" => "Dashboard",
            "link" => "dash",
            "countAnggota" => $anggotaCount,
            "countAngsuran" => $angsuranCount,
            "countPinjaman" => $pinjamanCount,
            "countSimpanan" => $simpananCount,
        ];

        // Cek apakah $totalPokok tidak NULL sebelum menambahkannya ke $data
        if (!$simpananDatas->isEmpty()) {
            $data += [
                "totalPokok" => $totalPokok,
                "totalWajib" => $totalWajib,
                "totalSukarela" => $totalSukarela,
            ];
        }

        // Tambahkan data lainnya ke dalam $data

        // Tampilkan halaman index dengan menggunakan fungsi compact()
        return view('pages.index', compact('anggotaBaruCount', 'anggotaLamaCount', 'monthlySums', 'simpananDatas') + $data);


    }
}
