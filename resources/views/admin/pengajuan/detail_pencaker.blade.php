<tr>
    <th style="width: 30%;color: #1b55e2;">Ijazah Terakhir</th>
    <td><a href="{{ asset('upload/pencaker/ijazah_terakhir/'.$v->ijazah_terakhir)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Transkrip Nilai</th>
    <td><a href="{{ asset('upload/pencaker/transkrip_nilai/'.$v->transkrip_nilai)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Foto Warna 4 x 6</th>
    <td><a href="{{ asset('upload/pencaker/foto/'.$v->foto)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Sertifikat Keahlian</th>
    <td><a href="{{ asset('upload/pencaker/sertifikat/'.$v->sertifikat)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">KTP</th>
    <td><a href="{{ asset('upload/pencaker/ktp/'.$v->ktp)}}" class="btn btn-sm btn-primary btn-flat" style="background:#1b55e2" target="_blank" > Download</a></td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Berat Badan (Kg)</th>
    <td>{{ $v->berat_badan }} Kg</td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Tinggi Badan (Cm)</th>
    <td>{{ $v->tinggi_badan }} Cm</td>
</tr>

<tr>
    <th style="width: 30%;color: #1b55e2;">Tujuan Perusahaan</th>
    <td>{{ $v->tujuan_perusahaan }}</td>
</tr>
