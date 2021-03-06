
<div id="hasil">
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-4">
            <thead>
                <tr>
                    <th style="width: 60px">No</th>
                    <th>Nama Supplier</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($supplier as $v)
                <tr>
                    <td>{{ ($supplier ->currentpage()-1) * $supplier ->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $v->nama_supplier }}</td>
                    <td>{{ $v->telepon }}</td>
                    <td>{{ $v->alamat }}</td>
                    <td class="text-center">
                        <ul class="table-controls">
                            <li><a href="{{ url('/'.Request::segment(1).'/edit/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                            <li><a href="{{ url('/'.Request::segment(1).'/hapus/'.$v->id ) }}" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Anda Yakin ?');"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">{{ $supplier->appends(Request::only('search'))->links() }}</div>
    </div>
</div>
</div>