<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota
{

    private static $data = [
        "nama" => "Aditya",
        "no_anggota" => "42321214958",
        "tgl_bergabung" => "20-06-2023",
        "no_ktp" => "210103014864",
        "masa_berlaku_ktp" => "Seumur Hidup",
        "jenis_kelamin" => "Laki-Laki",
        "tmpt_tgl_lahir" => "Batam, 12-03-1999",
        "alamat_ktp" => "Taman anggrek",
        "alamat" => "-",
        "no_telp" => "082288445566",
        "no_telp_rumah" => "63-0834-23",
        "status_tmpt_tggl" => "Kontrak",
        "tinggal_sejak" => "12-04-2021",
        "pend_terakhir" => "SMA Sederajat",
        "status_kawin" => "Belum Menikah",
        "nama_pasangan" => "-",
        "jumlah_anak" => "-",
        "nama_ibu_kandung" => "Wati Wantati",
        "npwp_pribadi" => "81284-1412-12412",
        "nama_ahli_waris" => "Johan",
        "hubungan_ahli_waris" => "Adik",
        "no_telp_kantor" => "667739",
        "nik" => "2171114005004902",
        "no_rekening" => "3322110385",
        "jabatan" => "Operator",
        "tgl_mulai_kerja" => "12-12-2022",
        "status_karyawan" => "Aktif",
    ];

    public static function data(){
        return self::$data;
    }
}
