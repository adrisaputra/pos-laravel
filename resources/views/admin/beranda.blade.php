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

            @if (Auth::user()->group!=14)
                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing ">
                    <div class="row layout-top-spacing widget-statistic">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="#">
                                <div class="widget widget-one_hybrid" style="background: #0073b7;">
                                    <div class="widget-heading">
                                        <div class="row">
                                            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <p class="w-value" style="color:#ffffff;font-size:35px">{{ $pengajuan }}</p>
                                                <h5 class="" style="color:#ffffff;">Total Pengajuan</h5>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <i class="fa fa-id-card" style="font-size: 90px;color:#086195"></i>
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
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                            <a href="{{ url('user')}}">
                                <div class="widget widget-one_hybrid" style="background: #D81B60;">
                                    <div class="widget-heading">
                                        <div class="row">
                                            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <p class="w-value" style="color:#ffffff;font-size:35px">{{ $user }}</p>
                                                <h5 class="" style="color:#ffffff;">Total Pengguna</h5>
                                            </div>
                                            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <i class="fa fa-users" style="font-size: 90px;color:#ac134b"></i>
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

                <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="row widget-statistic">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 5px;">
                                <a href="{{ url('pengajuan_masuk')}}">
                                    <div class="widget widget-one_hybrid" style="background: #3f51b5;">
                                        <div class="widget-heading">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="w-value" style="color:#ffffff;font-size:35px">{{ $pengajuan_masuk }}</p>
                                                    <h5 class="" style="color:#ffffff;">Pengajuan Masuk</h5>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <i class="fa fa-arrow-down" style="font-size: 90px;color:#293783"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">    
                                            <div class="w-chart">
                                                <div id="hybrid_followers3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 5px;">
                                <a href="{{ url('pengajuan_di_proses')}}">
                                    <div class="widget widget-one_hybrid" style="background: #f39c12;">
                                        <div class="widget-heading">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="w-value" style="color:#ffffff;font-size:35px">{{ $pengajuan_di_proses }}</p>
                                                    <h5 class="" style="color:#ffffff;">Pengajuan Di Proses</h5>
                                                </div>
                                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <i class="fa fa-retweet" style="font-size: 90px;color:#c78113"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">    
                                            <div class="w-chart">
                                                <div id="hybrid_followers3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 5px;">
                                <a href="{{ url('pengajuan_masuk')}}">
                                    <div class="widget widget-one_hybrid" style="background: #00c0ef;">
                                        <div class="widget-heading">
                                            <div class="row">
                                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="w-value" style="color:#ffffff;font-size:35px">{{ $pengajuan_di_perbaiki }}</p>
                                                    <h5 class="" style="color:#ffffff;">Pengajuan Di perbaiki</h5>
                                                </div>
                                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <i class="fa fa-edit" style="font-size: 90px;color:#079bc0"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">    
                                            <div class="w-chart">
                                                <div id="hybrid_followers1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 5px;">
                                <a href="{{ url('pengajuan_selesai_di_proses')}}">
                                    <div class="widget widget-one_hybrid" style="background: #00a65a;">
                                        <div class="widget-heading">
                                            <div class="row">
                                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="w-value" style="color:#ffffff;font-size:35px">{{ $pengajuan_selesai_di_proses }}</p>
                                                    <h5 class="" style="color:#ffffff;">Pengajuan Selesai Di Proses</h5>
                                                </div>
                                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <i class="fa fa-check" style="font-size: 90px;color:#09854c"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">    
                                            <div class="w-chart">
                                                <div id="hybrid_followers3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom: 5px;">
                                <a href="{{ url('pengajuan_tidak_di_proses')}}">
                                    <div class="widget widget-one_hybrid" style="background: #dd4b39;">
                                        <div class="widget-heading">
                                            <div class="row">
                                                <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <p class="w-value" style="color:#ffffff;font-size:35px">{{ $pengajuan_tidak_di_proses }}</p>
                                                    <h5 class="" style="color:#ffffff;">Pengajuan Tidak Di Proses</h5>
                                                </div>
                                                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <i class="fa fa-times" style="font-size: 90px;color:#b83120"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">    
                                            <div class="w-chart">
                                                <div id="hybrid_followers3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-lg-5 connectedSortable">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="row widget-statistic">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <a href="#">
                                    <div class="widget widget-one_hybrid" style="background: #ffffff;">
                                        <div class="widget-heading">
                                            <div class="row">
                                                <p style="text-align:center;font-size:20px;font-weight:bold;margin-inline: auto;">SURVEY KEPUASAN MASYARAKAT </p>
                                                <div id="chartdiv"></div>
                                            </div>
                                        </div>
                                        <div class="widget-content">    
                                            <div class="w-chart">
                                                <div id="hybrid_followers3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                
            @else
            
                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <h3 style="margin-top:20px;text-align:center"><img src="{{ asset('upload/pengaturan/'.$pengaturan->logo_kecil) }}" style="max-height: 80px;width:60px"> PEMERINTAH KECAMATAN KABAENA BARAT</h3>
                    <p style="text-align:center;font-size:20px">Selamat Datang di Portal Pelayanan Terpadu Satu Pintu</p>
                    <p style="text-align:center;font-size:20px">LAYANAN ONLINE<p>

                    <div class="row layout-top-spacing widget-statistic">
                        @foreach($layanan as $v)
                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12">
                            @if($v->id ==8)
                            <a href="#">
                            @elseif($v->id ==15)
                            <a href="https://dpmptsp.bombanakab.go.id/perijinan.html">
                            @else
                            <a type="button" data-toggle="modal" data-target="#exampleModal{{ $v->id }}">
                            @endif
                                <div class="widget widget2 widget-one_hybrid tombol" style="background: #ffffff;margin-bottom: 20px;">
                                    <div class="widget-heading" style="height: 390px;">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <center><img src="{{ asset('upload/layanan/'.$v->gambar)}}" width="100%"></img><center>
                                                <p style="text-align:center;font-size:20px;font-weight:bold;padding-top:10px">{{ $v->nama_layanan }}</p>
                                                <p style="text-align:center"> {{ $v->keterangan }}</p>
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

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Persyaratan Pembuatan Dokumen</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {!! $v->persyaratan !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Tutup</button>
                                                        
                                                            <a href="{{ url('/pengajuan/create/'.$v->id )}}" class="btn btn-success"><i class="fa fa-check" style="color:#09854c"></i> BUAT PENGAJUAN</a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        @endforeach
                    </div>
                </div>

            @endif
            </div>

<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/material.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

@php
    $memuaskan = DB::table('skm_tbl')->where('skm',3)->count();
    $cukup = DB::table('skm_tbl')->where('skm',2)->count();
    $kurang = DB::table('skm_tbl')->where('skm',1)->count();
@endphp

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart);

// Add data
chart.data = [{
  "country": "Memuaskan",
  "litres": {{ $memuaskan }},
  "color": am4core.color("#00a65a")
},{
  "country": "Cukup",
  "litres": {{ $cukup }},
  "color": am4core.color("#f39c12")
}, {
  "country": "Kurang",
  "litres": {{ $kurang }},
  "color": am4core.color("#dd4b39")
}];

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeOpacity = 1;

// This creates initial animation
pieSeries.hiddenState.properties.opacity = 1;
pieSeries.hiddenState.properties.endAngle = -90;
pieSeries.hiddenState.properties.startAngle = -90;

chart.hiddenState.properties.radius = am4core.percent(0);


// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = true;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);

pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;

// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;

chart.legend = new am4charts.Legend();

pieSeries.colors.list = [
  am4core.color("#00a65a"),
  am4core.color("#f39c12"),
  am4core.color("#dd4b39")
];

}); // end am4core.ready()
</script>    
@endsection