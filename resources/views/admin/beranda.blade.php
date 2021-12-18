@extends('admin/layout')
@section('konten')
@php 
    $pengaturan = DB::table('pengaturan_tbl')->find(1);
@endphp

<style>
.widget2:hover{
border-radius:6px;
border:2px solid #304aca;
}
</style>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing ">
                    <div class="row layout-top-spacing widget-statistic">
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="#">
                                <div class="widget widget-one_hybrid" style="background: #00c0ef;">
                                    <div class="widget-heading">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                <p class="w-value" style="color: #ffffff;font-size: 35px;">3</p>
                                                <h4 style="color: #ffffff;">Produk</h4>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5" style="text-align:right;padding-top:10px;">
                                                <i class="fa fa-box" style="font-size: 70px;color:#079bc0"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="{{ url('user')}}">
                                <div class="widget widget-one_hybrid" style="background: #00a65a;">
                                    <div class="widget-heading">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                <p class="w-value" style="color: #ffffff;font-size: 35px;">3</p>
                                                <h4 style="color: #ffffff;">Supplier</h4>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5" style="text-align:right;padding-top:10px;">
                                                <i class="fa fa-truck" style="font-size: 70px;color:#09854c"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>  
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="{{ url('user')}}">
                                <div class="widget widget-one_hybrid" style="background: #f39c12;">
                                    <div class="widget-heading">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                <p class="w-value" style="color:#ffffff;font-size:35px">0</p>
                                                <h4 class="" style="color:#ffffff;">Pelanggan</h4>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5" style="text-align:right;padding-top:10px;">
                                                <i class="fa fa-users" style="font-size: 70px;color:#c78113"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>   
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="{{ url('user')}}">
                                <div class="widget widget-one_hybrid" style="background: #dd4b39;">
                                    <div class="widget-heading">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                                <p class="w-value" style="color:#ffffff;font-size:35px">0</p>
                                                <h4 class="" style="color:#ffffff;">Pengguna</h4>
                                            </div>
                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5" style="text-align:right;padding-top:10px;">
                                                <i class="fa fa-user" style="font-size: 70px;color:#b83120"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>   
                    </div>
                </div>

                
            </div>

@endsection