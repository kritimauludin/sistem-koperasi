<?php

namespace App\Exports;

use App\Models\Pinjaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PinjamanExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('pages.pinjaman.export', [
            'pinjamans' => Pinjaman::all(),
            'headings' => ['Nama Anggota', 'Kategori Usaha', 'Jenis Anggota', 'Alamat', 'Tanggal Pinjaman', 'Jumlah Pinjaman', 'Lama pinjaman', 'Bunga'],
        ]);
    }
}
