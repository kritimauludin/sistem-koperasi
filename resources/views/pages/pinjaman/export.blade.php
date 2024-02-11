<!-- resources/views/export/simpanan.blade.php -->
<style>
    .text-size-30 {
        font-size: 30px;
    }

    .table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<table width=100%; style="border: none;">
    <tr style="border: none;">
        <td style="text-align: center; border: none;">
            <img src="https://3.bp.blogspot.com/-6FgxEvz6QAQ/Xxu_-pSgGoI/AAAAAAAAavk/MAWiwNh_ReMqjwHO-NYBnUG3T-NbTACXgCLcBGAsYHQ/s1600/Lambang-Kota-Bogor_237desain.blogspot.com.png"
                height="100px" alt="">
        </td>
        <td style="text-align: center; border: none;">
            <h4 style="margin: 0;">PEMERINTAH DAERAH KOTA BOGOR</h4>
            <h3 style="margin: 0;">KECAMATAN BOGOR TENGAH</h3>
            <h2 style="margin: 0;">KELURAHAN PALEDANG</h2>
            <p style="margin: 0;">JL. Selot No. 18 Telp. (0251) 8327383 <br> BOGOR Kode Pos 16122</p>
        </td>
    </tr>
</table>

<hr style="margin: 0;">
<hr style="margin: 0;">

<div style="text-align: center; margin-top: 20px; ">
    Data Pinjaman UP2K-PKK / {{ date('d-m-Y') }}
</div>

<table width=100%;
    style="table-layout: auto; width: 100%; border-collapse: collapse; margin-top: 10px; margin-left: 10px;"
    class="table">
    <thead>
        <tr>
            @foreach ($headings as $heading)
                <th style="font-size: 12px; text-align:center; paddding:5px">{{ $heading }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($pinjamans as $pinjaman)
            <tr>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->anggota->nama }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->anggota->kategori }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->anggota->jenis }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->anggota->alamat }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->tgl }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->jumlah }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->lama }}</td>
                <td style="font-size: 12px; text-align:center; paddding:5px">{{ $pinjaman->bunga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table style="border: none; text-align: center; font-size=15px; margin-left: 480px;">
    <tr style="border: none;">
        <td style="border: none;">
            <p>Mengetahui, </p>
            <p><b>Ketua TP-PKK</b></p>
            <br>
            <br>
            <br>
            <br>
            <p>____________________________</p>
            <p><b>Lia Irmala</b></p>
        </td>
    </tr>
</table>
