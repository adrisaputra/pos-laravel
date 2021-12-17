@extends('admin/pengajuan/create')
@section('create_kartu_keluarga')

<input type="hidden" class="form-control" name="nama_layanan" value="{{ $layanan->nama_layanan }}" >
<input type="hidden" class="form-control" name="layanan_id" value="{{ Request::segment(3) }}" >

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Kategori') }}<span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <select class="form-control" name="kategori" onchange=" if (this.selectedIndex==1){ 
														document.getElementById('1').style.display = 'inline'; 
														document.getElementById('2').style.display = 'none'; 
														document.getElementById('3').style.display = 'none'; 
														document.getElementById('4').style.display = 'none'; 
														document.getElementById('5').style.display = 'none'; 
														document.getElementById('6').style.display = 'none'; 
													} else if (this.selectedIndex==2){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'inline';
														document.getElementById('3').style.display = 'none';
														document.getElementById('4').style.display = 'none'; 
														document.getElementById('5').style.display = 'none'; 
														document.getElementById('6').style.display = 'none'; 
													}else if (this.selectedIndex==3){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'none';
														document.getElementById('3').style.display = 'inline';
														document.getElementById('4').style.display = 'none'; 
														document.getElementById('5').style.display = 'none'; 
														document.getElementById('6').style.display = 'none'; 
													}else if (this.selectedIndex==4){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'none';
														document.getElementById('3').style.display = 'none';
														document.getElementById('4').style.display = 'inline'; 
														document.getElementById('5').style.display = 'none'; 
														document.getElementById('6').style.display = 'none'; 
													}else if (this.selectedIndex==5){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'none';
														document.getElementById('3').style.display = 'none';
														document.getElementById('4').style.display = 'none'; 
														document.getElementById('5').style.display = 'inline'; 
														document.getElementById('6').style.display = 'none'; 
													}else if (this.selectedIndex==6){
														document.getElementById('1').style.display = 'none'; 
														document.getElementById('2').style.display = 'none';
														document.getElementById('3').style.display = 'none';
														document.getElementById('4').style.display = 'none'; 
														document.getElementById('5').style.display = 'none'; 
														document.getElementById('6').style.display = 'inline'; 
													};">
			<option value="">- Pilih -</option>
            <option value="1" @if(old('kategori')=="1") selected @endif>KK Baru</option>
            <option value="2" @if(old('kategori')=="2") selected @endif>KK Hilang</option>
            <option value="3" @if(old('kategori')=="3") selected @endif>KK Perkawinan</option>
            <option value="4" @if(old('kategori')=="4") selected @endif>KK Perubahan Data</option>
            <option value="5" @if(old('kategori')=="5") selected @endif>KK Pindah Datang</option>
            <option value="6" @if(old('kategori')=="6") selected @endif>KK Rusak</option>
        </select>
        @if ($errors->has('kategori')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kategori') }}</div>@endif
    </div>
</div>
			
@if(old('kategori')=="1")
    <span id='1' style='display:display;'>
@else
    <span id='1' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir Permohonan') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir Permohonan" name="surat_permohonan" value="{{ old('surat_permohonan') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_permohonan')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_permohonan') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Suket dan Pernyataan Domisili Kades/Lurah, Camat disertai saksi2') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Suket dan Pernyataan Domisili Kades/Lurah, Camat disertai saksi2" name="pernyataan_domisili" value="{{ old('pernyataan_domisili') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('pernyataan_domisili')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('pernyataan_domisili') }}</div>@endif
    </div>
</div>

</span>
	
@if(old('kategori')=="2")
    <span id='2' style='display:display;'>
@else
    <span id='2' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Keterangan Hilang dari Kepala Desa atau Lurah atau Kepolisian') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Keterangan Hilang dari Kepala Desa atau Lurah atau Kepolisian" name="surat_keterangan_hilang" value="{{ old('surat_keterangan_hilang') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_keterangan_hilang')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_hilang') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp" value="{{ old('ktp') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp') }}</div>@endif
    </div>
</div>

</span>
	
@if(old('kategori')=="3")
    <span id='3' style='display:display;'>
@else
    <span id='3' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK Lama (suami istri)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK Lama (suami istri)" name="kartu_keluarga_lama" value="{{ old('kartu_keluarga_lama') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga_lama')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Formulir KK (F.1-01)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Formulir KK (F.1-01)" name="formulir_kk" value="{{ old('formulir_kk') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('formulir_kk')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('formulir_kk') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP Suami dan Istri') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP Suami dan Istri" name="ktp2" value="{{ old('ktp2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat Nikah/Akta Nikah') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat Nikah/Akta Nikah" name="surat_nikah" value="{{ old('surat_nikah') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_nikah')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_nikah') }}</div>@endif
    </div>
</div>

</span>

@if(old('kategori')=="4")
    <span id='4' style='display:display;'>
@else
    <span id='4' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK Lama') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK Lama" name="kartu_keluarga_lama2" value="{{ old('kartu_keluarga_lama2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga_lama2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP/Keterangan lahir dari bidan/kades/lurah') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP/Keterangan lahir dari bidan/kades/lurah" name="ktp3" value="{{ old('ktp3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp3')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp3') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Surat keterangan kematian dari desa/lurah bagi anggota keluarga yang meninggal') }}</label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Surat keterangan kematian dari desa/lurah bagi anggota keluarga yang meninggal" name="akta_kematian2" value="{{ old('akta_kematian2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('akta_kematian2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('akta_kematian2') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('Keterangan dari desa/lurah anak keberapa bagi anggota keluarga yang keluar/masuk') }}</label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="Keterangan dari desa/lurah anak keberapa bagi anggota keluarga yang keluar/masuk" name="surat_keterangan_dari_desa2" value="{{ old('surat_keterangan_dari_desa2') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('surat_keterangan_dari_desa2')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('surat_keterangan_dari_desa2') }}</div>@endif
    </div>
</div>

</span>

@if(old('kategori')=="5")
    <span id='5' style='display:display;'>
@else
    <span id='5' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK Lama (Pindah antar desa/Kelurahan dan antar kecamatan)') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK Lama (Pindah antar desa/Kelurahan dan antar kecamatan)" name="kartu_keluarga_lama3" value="{{ old('kartu_keluarga_lama3') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga_lama3')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama3') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('SKP WNI') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="SKP WNI" name="skp_wni" value="{{ old('skp_wni') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('skp_wni')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('skp_wni') }}</div>@endif
    </div>
</div>

</span>

@if(old('kategori')=="6")
    <span id='6' style='display:display;'>
@else
    <span id='6' style='display:none;'>
@endif

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KK yang rusak') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KK yang rusak" name="kartu_keluarga_lama4" value="{{ old('kartu_keluarga_lama4') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('kartu_keluarga_lama4')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('kartu_keluarga_lama4') }}</div>@endif
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">{{ __('KTP') }}  <span class="required" style="color: #dd4b39;">*</span></label>
    <div class="col-xl-9 col-lg-9 col-sm-10">
        <input type="file" class="form-control" placeholder="KTP" name="ktp4" value="{{ old('ktp4') }}" >
        <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 3 Mb (jpg,jpeg,png,pdf)</i></span>
        @if ($errors->has('ktp4')) <div class="invalid-feedback" style="display: block;">{{ $errors->first('ktp4') }}</div>@endif
    </div>
</div>

</span>

@endsection