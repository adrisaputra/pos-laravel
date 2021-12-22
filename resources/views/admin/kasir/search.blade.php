
<div id="hasil">
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-4">
            <thead>
                <tr>
                    <th style="width: 60px">No</th>
                    <th>Barcode</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual (Rp)</th>
                    <th>Diskon (%)</th>
                    <th>Stok</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($barang as $i => $v)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $v->barcode }}</td>
                    <td>{{ $v->nama_barang }}</td>
                    <td>{{ number_format($v->harga_jual, 0, ',', '.') }}</td>
                    <td>{{ number_format($v->diskon, 0, ',', '.') }}</td>
                    <td>
                    @php 
                        $pembelian = DB::table('pembelian_tbl')
                                    ->select(DB::raw("SUM(jumlah) as total_pembelian"))
                                    ->where('barcode',$v->barcode)
                                    ->first();
                        $retur = DB::table('retur_tbl')
                                    ->select(DB::raw("SUM(jumlah) as total_retur"))
                                    ->where('barcode',$v->barcode)
                                    ->first();
                    @endphp   
                    {{ number_format(($v->stok_awal + $pembelian->total_pembelian)-$retur->total_retur, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <ul class="table-controls">
                            <li>
                            <form action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
                                    <input type="hidden" name="barcode" value="{{ $v->barcode }}">
                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Simpan" style="border: none;outline: none;background: none;cursor: pointer;color: #0000EE;padding: 0;text-decoration: underline;font-family: inherit;font-size: inherit;"><i class="far fa-save text-success" style="font-size:22px;"></i></button></li>
							</form>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>