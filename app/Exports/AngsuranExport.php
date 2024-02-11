<?php

namespace App\Exports;

use App\Models\Angsuran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class AngsuranExport implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('pages.angsuran.export', [
            'angsurans' => Angsuran::all(),
            'headings' => ['Nama Anggota', 'Kategori Usaha', 'Jenis Anggota', 'Alamat', 'Lama Pinjaman', 'Jumlah Pinjaman', 'Bunga', 'Keterangan Lunas'],
        ]);
    }
}
