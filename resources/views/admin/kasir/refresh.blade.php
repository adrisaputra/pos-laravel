
                                <div id="hasil2">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th style="width: 60px">No</th>
                                                    <th>Barcode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Diskon</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    <th style="width: 150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
				                            @php $total = 0; @endphp
                                            @foreach($kasir as $v)
                                                <tr>
                                                    <td style="width: 5%">{{ $loop->index + 1 }}</td>
                                                    <td style="width: 10%"><b>{{ $v->barcode }}<b></td>
                                                    <td style="width: 30%"><b>{{ $v->nama_barang }}<b></td>
                                                    <td style="width: 15%"><b>{{ number_format($v->harga, 0, ',', '.') }}<b></td>
                                                    <td style="width: 10%"><b>{{ number_format($v->diskon, 0, ',', '.') }}<b>
                                                    <td style="width: 15%">
                                                        <input type="hidden" class="form-control" value="{{ $v->id }}" id="id{{ $v->id }}">
                                                        <input type="hidden" class="form-control" value="{{ $v->harga }}" id="harga{{ $v->id }}">
                                                        @php 
                                                            $barang = DB::table('barang_tbl')
                                                                        ->where('barcode',$v->barcode)
                                                                        ->first();
                                                            $pembelian = DB::table('pembelian_tbl')
                                                                        ->select(DB::raw("SUM(jumlah) as total_pembelian"))
                                                                        ->where('barcode',$v->barcode)
                                                                        ->first();
                                                            $retur = DB::table('retur_tbl')
                                                                        ->select(DB::raw("SUM(jumlah) as total_retur"))
                                                                        ->where('barcode',$v->barcode)
                                                                        ->first();
                                                        @endphp   
                                                        <input type="hidden" class="form-control" value="{{ ($barang->stok_awal + $pembelian->total_pembelian)-$retur->total_retur }}" id="stok{{ $v->id }}">
                                                        <input type="text" class="form-control" value="{{ $v->jumlah }}" name="jumlah[]" id="jumlah{{ $v->id }}" onkeyup="ubah_jumlah{{ $v->id }}();findTotal();" required>
                                                        <input type="hidden" name="qty" id="qty{{ $v->id }}" value="{{ $v->total }}"/>
                                                    </td>
                                                    <td style="width: 20%"><span style="font-size:16px;"><b id="total{{ $v->id }}">{{ number_format($v->harga * $v->jumlah,0,",",".") }}</b></span></td>
                                                    <td class="text-center" style="width: 5%">
                                                        <ul class="table-controls">
                                                            <li><a href="#" onclick="hapus{{ $v->id }}();"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <script>
                                                    function ubah_jumlah{{ $v->id }}()
                                                    {
                                                        harga = document.getElementById("harga{{ $v->id }}").value;
                                                        jumlah = document.getElementById("jumlah{{ $v->id }}").value;
                                                        stok = document.getElementById("stok{{ $v->id }}").value;
                                                        stok = parseInt(stok);
                                                        id = document.getElementById("id{{ $v->id }}").value;
                                                        total_keseluruhan = convertToRupiah(harga * jumlah); 
                                                        total_keseluruhan2 = harga * jumlah;	
                                                        if(jumlah>stok){
                                                            document.getElementById("total{{ $v->id }}").textContent=total_keseluruhan;
                                                            document.getElementById("total{{ $v->id }}").style.color='red';
                                                        } else {
                                                            document.getElementById("total{{ $v->id }}").textContent=total_keseluruhan;
                                                            document.getElementById("total{{ $v->id }}").style.color='black';
                                                        }
                                                        document.getElementById("qty{{ $v->id }}").value=total_keseluruhan2;

                                                        url = "{{ url('/kasir/edit2') }}"
                                                        $.ajax({
                                                            url:""+url+"/"+id+"/"+jumlah+"",
                                                            method:"GET",  
                                                            data:{
                                                                id : id,
                                                                jumlah: jumlah
                                                            },                              
                                                            success: function( data ) {
                                                                console.log(data);
                                                            }
                                                        });

                                                    }
                                                    function hapus{{ $v->id }}()
                                                    {
                                                        id = document.getElementById("id{{ $v->id }}").value;
                                                        url = "{{ url('/kasir/hapus') }}"
                                                        $.ajax({
                                                            url:""+url+"/"+id+"",
                                                            method:"GET",  
                                                            data:{
                                                                id : id,
                                                            },                              
                                                            success: function( data ) {
                                                                $("#hasil2").html(response);
                                                            }
                                                        });
                                                    }
                                                </script>
				                            @php $total =  ($v->harga *  $v->jumlah) + $total; @endphp
                                            @endforeach
                                            <script type="text/javascript">
                                                function findTotal(){
                                                    var arr = document.getElementsByName('qty');
                                                    var tot=0;
                                                    for(var i=0;i<arr.length;i++){
                                                        if(parseInt(arr[i].value))
                                                            tot += parseInt(arr[i].value);
                                                    }
                                                    total_keseluruhan = convertToRupiah(tot);
                                                    document.getElementById('total_keseluruhan').textContent = total_keseluruhan;
                                                    document.getElementById('total_keseluruhan2').textContent = total_keseluruhan;
                                                    document.getElementById('total_keseluruhan3').value = tot;
                                                }
                                            </script>
                                            <tr>
                                                <th colspan="6"><center>TOTAL</center></th>
                                                <th colspan="2" class="col-md-3" style="background-color: #28a745;" data-toggle="modal" data-target="#bayar"><span style="color: #ffffff;text-align: right;font-size:18px;font-weight:bold;"><b id="total_keseluruhan">{{ number_format($total,0,",",".") }}</b></span></th>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <!-- Modal -->
                                        <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">BAYAR</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6" style="padding-top: 10px;">
                                                                <div class="row">
                                                                    <div class="col-md-4" style="padding-right: 0px;">
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="1">Uang Pas</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="50">50</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="100">100</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-4" style="padding-right: 0px;">
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="200">200</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="500">500</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="1000">1.000</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-4" style="padding-right: 0px;">
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="2000">2.000</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="5000">5.000</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="10000">10.000</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-4" style="padding-right: 0px;">
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="20000">20.000</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="50000">50.000</a>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-info btn-block" onclick="myFunction(this.name)" name="100000">100.000</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6" style="padding-right: 0px;">
                                                                        <a type="button" class="btn mb-2 btn-success btn-block" onclick="myFunction(this.name)" name="20000">Diskon (%)</a>
                                                                    </div>
                                                                    <div class="col-md-6" style="padding-right: 0px;" >
                                                                        <a type="button" class="btn mb-2 btn-success btn-block" onclick="myFunction(this.name)" name="50000">Diskon (Rp)</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-12" style="padding-right: 0px;">
                                                                        <a type="button" class="btn mb-2 btn-danger btn-block" onclick="myFunction(this.name)" name="0">Reset</a>
                                                                    </div>
                                                                </div>

                                                                <script type="text/javascript">
                                                                    function myFunction(uang)
                                                                    {
                                                                        jumlah_bayar = document.getElementById("jumlah_bayar").value;
                                                                        total_keseluruhan3 = document.getElementById("total_keseluruhan3").value;
                    
                                                                        if(uang==0){
                                                                            jumlah_bayar2 = 0;
                                                                        } else if(uang==1){
                                                                            jumlah_bayar2 = total_keseluruhan3;
                                                                        } else {
                                                                            if(jumlah_bayar==""){
                                                                                jumlah_bayar2 = uang;
                                                                            } else {
                                                                                jumlah_bayar2 = parseInt(jumlah_bayar) + parseInt(uang);
                                                                            }
                                                                        }
                                                                        document.getElementById("jumlah_bayar").value=jumlah_bayar2;
                                                                        
                                                                        total_keseluruhan4 = parseInt(jumlah_bayar2) - parseInt(total_keseluruhan3);
                                                                        total_keseluruhan4 = convertToRupiah(total_keseluruhan4);
                                                                        if(jumlah_bayar2<=0){
                                                                            document.getElementById("kembalian").textContent="0";
                                                                        } else {
                                                                            if(total_keseluruhan4<0){
                                                                                document.getElementById("kembalian").style.color='red';
                                                                            } else {
                                                                                document.getElementById("kembalian").style.color='black';
                                                                            }
                                                                            document.getElementById("kembalian").textContent=total_keseluruhan4;
                                                                        }

                                                                    }
                                                                </script>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th style="width: 30%;border-top: 0px solid #dee2e6;">JENIS PEMBAYARAN</th>
                                                                        <th style="width: 70%;border-top: 0px solid #dee2e6;"><select class="form-control" name="jenis_pembayaran">
                                                                                <option value="1">CASH</option>
                                                                                <option value="2">DEBIT</option>
                                                                                <option value="3">KREDIT</option>
                                                                            </select>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 30%;border-top: 0px solid #dee2e6;">TAGIHAN</th>
                                                                        <th style="width: 70%;border-top: 0px solid #dee2e6;text-align: end;">
                                                                            <span style="color: #28a745;text-align: right;font-size:18px;font-weight:bold;text-align:right;">
                                                                                <b id="total_keseluruhan2">{{ number_format($total,0,",",".") }}</b>
                                                                                <input type="hidden" id="total_keseluruhan3" value="{{ $total }}">
                                                                            </span>
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width: 30%;border-top: 0px solid #dee2e6;">PEMBAYARAN</th>
                                                                        <th style="width: 70%;border-top: 0px solid #dee2e6;">
                                                                            <input type="text" name="search" style="height: calc(1.5em + 1.4rem + -8px);text-align: right;" class="form-control" id="jumlah_bayar" onkeyup="pembayaran();">
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>KEMBALIAN</th>
                                                                        <th style="text-align:right"><span style="color: #f44336;font-size:18px;font-weight:bold;"><b id="kembalian" style="">0</b></span></th>
                                                                    </tr>
                                                                </table>

                                                                <script type="text/javascript">
                                                                    function pembayaran()
                                                                    {
                                                                        jumlah_bayar = document.getElementById("jumlah_bayar").value;
                                                                        total_keseluruhan3 = document.getElementById("total_keseluruhan3").value;
                                                                        total_keseluruhan4 = parseInt(jumlah_bayar) - parseInt(total_keseluruhan3);
                                                                        total_keseluruhan4 = convertToRupiah(total_keseluruhan4);
                                                                        if(jumlah_bayar<=0){
                                                                            document.getElementById("kembalian").textContent="0";
                                                                        } else {
                                                                            if(total_keseluruhan4<0){
                                                                                document.getElementById("kembalian").style.color='red';
                                                                            } else {
                                                                                document.getElementById("kembalian").style.color='black';
                                                                            }
                                                                            document.getElementById("kembalian").textContent=total_keseluruhan4;
                                                                        }

                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            