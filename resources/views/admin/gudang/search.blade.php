<div id="hasil">
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-4">
            <thead>
                <tr>
                    <th style="width: 60px">No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Tersedia</th>
                    <th>Stok Minimal</th>
                    <th>Stok Maksimal</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($gudang as $v)
            @php
            $percent = round(($v->in_stok / $v->full_stok) * 100);
            $color = 'grey';
            $stock_color = '';
            if($v->in_stok < $v->min_stok) $stock_color = 'red-text';
                if ($percent < 33) $color='bg-danger' ; elseif ($percent < 66) $color='bg-warning' ; else $color='bg-success' ; @endphp <tr>
                    <td>{{ ($gudang->currentpage() - 1) * $gudang->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $v->barang->barcode }}</td>
                    <td>{{ $v->barang->nama_barang }}</td>
                    <td class="{{ $stock_color }}"><b>{{ $v->in_stok }}</b></td>
                    <td>{{ $v->min_stok }}</td>
                    <td>{{ $v->full_stok }}</td>
                    <td>
                        <div class="progress br-30" style="height: 25px;">
                            <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{ $percent }}%</div>
                        </div>
                    </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">{{ $gudang->appends(Request::only('search'))->links() }}</div>
    </div>
</div>