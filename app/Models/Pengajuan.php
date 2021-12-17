<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    // use HasFactory;
	protected $table = 'pengajuan_tbl';
	protected $fillable =[
        'no_pengajuan',
        'nik',
        'nama',
        'no_hp',
        'alamat',
        'ktp',
        'kartu_keluarga',
        'foto',
        'surat_keterangan_dari_desa',
        'ijazah_terakhir',
        'transkrip_nilai',
        'sertifikat',
        'tinggi_badan',
        'berat_badan',
        'tujuan_perusahaan',
        'formulir_akta_kematian',
        'surat_keterangan_kematian',
        'surat_pengantar_rt',
        'akta_pendirian',
        'surat_keterangan_terdaftar',
        'bukti_lunas_pbb',
        'skaw',
        'akta_kematian',
        'buku_akta_nikah',
        'akta_kelahiran',
        'buku_lunas_pbb',
        'kartu_bpjs',
        'suket_bekerja',
        'suket_berhenti_bekerja',
        'suket_pengunduran_diri',
        'penetapan_phk',
        'surat_permohonan',
        'surat_kuasa',
        'keterangan_jual_beli_kapal',
        'foto_kapal',
        'pernyataan_domisili',
        'surat_keterangan_hilang',
        'kartu_keluarga_lama',
        'formulir_kk',
        'surat_nikah',
        'skp_wni',
        'formulir_akta_kelahiran',
        'suket_lahir',
        'formulir_pengangkatan_anak',
        'persetujuan_pengadilan',
        'sptjm',
        'buku_nikah',
        'surat_pernyataan',
        'catatan_perbaikan',
        'nama_layanan',
        'layanan_id',
        'desa',
        'hasil',
        'status',
        'status_hapus',
        'kategori',
        'layanan_id',
        'eksekutor',
        'tanggal',
        'user_id',
        'admin_id'
    ];
}
