@if($v->kategori==1)

<tr>
    <th style="width: 30%;color: #1b55e2;">Formulir Akta Kelahiran</th>
    <td><a href="{{ asset('upload/akta_kelahiran_anak_ibu/formulir_akta_kelahiran/'.$v->formulir_akta_kelahiran)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Suket Lahir dari Dokter/Bidan Penolong</th>
    <td><a href="{{ asset('upload/akta_kelahiran_anak_ibu/suket_lahir/'.$v->suket_lahir)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Kartu keluarga</th>
    <td><a href="{{ asset('upload/akta_kelahiran_anak_ibu/kartu_keluarga/'.$v->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP (Suami Istri)</th>
    <td><a href="{{ asset('upload/akta_kelahiran_anak_ibu/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==2)

<tr>
    <th style="width: 30%;color: #1b55e2;">Formulir Pengangkatan Anak</th>
    <td><a href="{{ asset('upload/akta_kelahiran_pengangkatan_anak/formulir_pengangkatan_anak/'.$v->formulir_pengangkatan_anak)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Akta Kelahiran Anak</th>
    <td><a href="{{ asset('upload/akta_kelahiran_pengangkatan_anak/akta_kelahiran/'.$v->akta_kelahiran)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Kartu keluarga</th>
    <td><a href="{{ asset('upload/akta_kelahiran_pengangkatan_anak/kartu_keluarga/'.$v->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP Orang Tua Angkat</th>
    <td><a href="{{ asset('upload/akta_kelahiran_pengangkatan_anak/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Persetujuan Pengadilan</th>
    <td><a href="{{ asset('upload/akta_kelahiran_pengangkatan_anak/persetujuan_pengadilan/'.$v->persetujuan_pengadilan)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==3)

<tr>
    <th style="width: 30%;color: #1b55e2;">Formulir Akta Kelahiran</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tidak_tercatat/formulir_akta_kelahiran/'.$v->formulir_akta_kelahiran)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Suket Lahir dari Dokter/Bidan Penolong</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tidak_tercatat/suket_lahir/'.$v->suket_lahir)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Kartu keluarga</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tidak_tercatat/kartu_keluarga/'.$v->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP (Suami istri)</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tidak_tercatat/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">SPTJM Suami Istri</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tidak_tercatat/sptjm/'.$v->sptjm)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==4)

<tr>
    <th style="width: 30%;color: #1b55e2;">Formulir Akta Kelahiran</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tercatat/formulir_akta_kelahiran/'.$v->formulir_akta_kelahiran)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Suket Lahir dari Dokter/Bidan Penolong</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tercatat/suket_lahir/'.$v->suket_lahir)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Kartu keluarga</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tercatat/kartu_keluarga/'.$v->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP (Suami istri)</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tercatat/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Buku Nikah</th>
    <td><a href="{{ asset('upload/akta_kelahiran_tercatat/buku_nikah/'.$v->buku_nikah)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@endif