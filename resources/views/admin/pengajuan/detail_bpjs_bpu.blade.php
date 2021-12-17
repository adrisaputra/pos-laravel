@if($v->kategori==1)

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP/Paspor Peserta</th>
    <td><a href="{{ asset('upload/bpjs_bpu/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@elseif($v->kategori==2)

<tr>
    <th style="width: 30%;color: #1b55e2;">Kartu BPJS</th>
    <td><a href="{{ asset('upload/bpjs_jht/kartu_bpjs/'.$v->kartu_bpjs)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP/Paspor Peserta</th>
    <td><a href="{{ asset('upload/bpjs_jht/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Kartu Keluarga</th>
    <td><a href="{{ asset('upload/bpjs_jht/kartu_keluarga/'.$v->kartu_keluarga)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Surat Keterangan Aktif Bekerja</th>
    <td><a href="{{ asset('upload/bpjs_jht/suket_bekerja/'.$v->suket_bekerja)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Surat Keterangan Berhenti Bekerja Dari Perusahaan</th>
    <td><a href="{{ asset('upload/bpjs_jht/suket_berhenti_bekerja/'.$v->suket_berhenti_bekerja)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Surat Keterangan Pengunduran Diri</th>
    <td><a href="{{ asset('upload/bpjs_jht/suket_pengunduran_diri/'.$v->suket_pengunduran_diri)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Penetapan PHK dari PHI</th>
    <td><a href="{{ asset('upload/bpjs_jht/penetapan_phk/'.$v->penetapan_phk)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

@endif