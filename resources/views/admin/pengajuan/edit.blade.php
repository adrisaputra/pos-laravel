@extends('admin/layout')
@section('konten')
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">
                    <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>{{ _($title)}}</h4>
                                    </div>                 
                                </div>
                            </div>
                            <div class="widget-content widget-content-area" style="padding-top: 0px;">
							<form action="{{ url('/'.Request::segment(1).'/perbaiki/'.$pengajuan->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="PUT">
	
                                @if($pengajuan->layanan_id==1)
                                    @yield('edit_iumk')
                                @elseif($pengajuan->layanan_id==2)
                                    @yield('edit_sekretariat')
                                @elseif($pengajuan->layanan_id==4)
                                    @yield('edit_akta_kematian')
                                @elseif($pengajuan->layanan_id==5)
                                    @yield('edit_ahli_waris')
                                @elseif($pengajuan->layanan_id==6)
                                    @yield('edit_domisili')
                                @elseif($pengajuan->layanan_id==7)
                                    @yield('edit_bpjs_bpu')
                                @elseif($pengajuan->layanan_id==9)
                                    @yield('edit_kartu_keluarga')
                                @elseif($pengajuan->layanan_id==10)
                                    @yield('edit_akta_kelahiran')
                                @elseif($pengajuan->layanan_id==11)
                                    @yield('edit_kia')
                                @elseif($pengajuan->layanan_id==12)
                                    @yield('edit_pacak_kapal')
                                @elseif($pengajuan->layanan_id==13)
                                    @yield('edit_pencaker')
                                @elseif($pengajuan->layanan_id==14)
                                    @yield('edit_pernikahan')
                                @endif
									
								<button type="submit" class="btn btn-success">Simpan</button>
								<button type="reset" class="btn btn-warning">Reset</button>
								<a href="{{ url('/'.Request::segment(1)) }}" class="btn btn-danger">Kembali</a>
							</form>	
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@endsection