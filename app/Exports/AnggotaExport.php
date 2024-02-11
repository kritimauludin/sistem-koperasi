<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Alignment;

class AnggotaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Anggota::select('nama', 'nik', 'jeniskelamin', 'tgl', 'jenis', 'kategori', 'alamat')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'NIK', 'Jenis Kelamin', 'Tanggal Masuk', 'Jenis Anggota', 'Kategori Usaha', 'Alamat'];
    }
}
