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
                                        <h4>{{ _($title)}} <br>{{ $layanan->nama_layanan }}</h4>
                                    </div>                 
                                </div>
                            </div>
                            <div class="widget-content widget-content-area" style="padding-top: 0px;">
					            <form action="{{ url('/pengajuan') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
								{{ csrf_field() }}
									
                                    @if(Request::segment(3)==1)
                                        @yield('create_iumk')
                                    @elseif(Request::segment(3)==2)
                                        @yield('create_sekretariat')
                                    @elseif(Request::segment(3)==4)
                                        @yield('create_akta_kematian')
                                    @elseif(Request::segment(3)==5)
                                        @yield('create_ahli_waris')
                                    @elseif(Request::segment(3)==6)
                                        @yield('create_domisili')
                                    @elseif(Request::segment(3)==7)
                                        @yield('create_bpjs_bpu')
                                    @elseif(Request::segment(3)==9)
                                        @yield('create_kartu_keluarga')
                                    @elseif(Request::segment(3)==10)
                                        @yield('create_akta_kelahiran')
                                    @elseif(Request::segment(3)==11)
                                        @yield('create_kia')
                                    @elseif(Request::segment(3)==12)
                                        @yield('create_pacak_kapal')
                                    @elseif(Request::segment(3)==13)
                                        @yield('create_pencaker')
                                    @elseif(Request::segment(3)==14)
                                        @yield('create_pernikahan')
                                    @endif
									
									<button type="submit" class="btn btn-success">Simpan</button>
									<button type="reset" class="btn btn-warning">Reset</button>
									<a href="{{ url('/') }}" class="btn btn-danger">Kembali</a>
								</form>	
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@endsection