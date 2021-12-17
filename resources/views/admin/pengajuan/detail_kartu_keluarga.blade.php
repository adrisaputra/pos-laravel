@if($v->kategori==1)

<tr>
    <th style="width: 30%;color: #1b55e2;">Formulir Permohonan</th>
    <td><a href="{{ asset('upload/kk_baru/surat_permohonan/'.$v->surat_permohonan)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Suket dan Pernyataan Domisili Kades/Lurah, Camat disertai saksi2</th>
    <td><a href="{{ asset('upload/kk_baru/pernyataan_domisili/'.$v->pernyataan_domisili)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==2)

<tr>
    <th style="width: 30%;color: #1b55e2;">Surat Keterangan Hilang dari Kepala Desa atau Lurah atau Kepolisian</th>
    <td><a href="{{ asset('upload/kk_hilang/surat_keterangan_hilang/'.$v->surat_keterangan_hilang)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP</th>
    <td><a href="{{ asset('upload/kk_hilang/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==3)

<tr>
    <th style="width: 30%;color: #1b55e2;">KK Lama (suami istri)</th>
    <td><a href="{{ asset('upload/kk_perkawinan/kartu_keluarga_lama/'.$v->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Formulir KK (F.1-01)</th>
    <td><a href="{{ asset('upload/kk_perkawinan/formulir_kk/'.$v->formulir_kk)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP Suami dan Istri</th>
    <td><a href="{{ asset('upload/kk_perkawinan/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Surat Nikah/Akta Nikah</th>
    <td><a href="{{ asset('upload/kk_perkawinan/surat_nikah/'.$v->surat_nikah)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==4)

<tr>
    <th style="width: 30%;color: #1b55e2;">KK Lama</th>
    <td><a href="{{ asset('upload/kk_perubahan_data/kartu_keluarga_lama/'.$v->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP/Keterangan lahir dari bidan/kades/lurah</th>
    <td><a href="{{ asset('upload/kk_perubahan_data/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Surat keterangan kematian dari desa/lurah bagi anggota keluarga yang meninggal</th>
    <td><a href="{{ asset('upload/kk_perubahan_data/akta_kematian/'.$v->akta_kematian)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Keterangan dari desa/lurah anak keberapa bagi anggota keluarga yang keluar/masuk</th>
    <td><a href="{{ asset('upload/kk_perubahan_data/surat_keterangan_dari_desa/'.$v->surat_keterangan_dari_desa)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==5)

<tr>
    <th style="width: 30%;color: #1b55e2;">KK Lama (Pindah antar desa/Kelurahan dan antar kecamatan</th>
    <td><a href="{{ asset('upload/kk_pindah_datang/kartu_keluarga_lama/'.$v->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">SKP WNI</th>
    <td><a href="{{ asset('upload/kk_pindah_datang/skp_wni/'.$v->skp_wni)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==6)

<tr>
    <th style="width: 30%;color: #1b55e2;">KK yang rusak</th>
    <td><a href="{{ asset('upload/kk_rusak/kartu_keluarga_lama/'.$v->kartu_keluarga_lama)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP</th>
    <td><a href="{{ asset('upload/kk_rusak/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@endif