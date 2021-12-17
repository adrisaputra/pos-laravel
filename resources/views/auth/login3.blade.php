@extends('layouts.app')

@section('content')
@php 
    $pengaturan = DB::table('pengaturan_tbl')->find(1);
@endphp
<div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <center><img src="{{ asset('upload/pengaturan/'.$pengaturan->logo_besar) }}" height="110px"><br><br>
						<!-- <h1 class="">Login</h1></center> -->
                        <form class="text-left" method="POST" action="{{ url('login-sistem') }}">
                        @csrf

                            <div class="form">

                            @if ($message = Session::get('status'))
                        <p class="alert text-center" style="color: #ffffff;background-color: #dd4b39;border-color: #d73925;">
                            {{ $message }}
                        </p>
                    @endif

                                <input type="hidden" class="form-control" name="tipe" value='2'>

                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="name" type="text" class="form-control" placeholder="Masukkan NIK" :value="old('name')">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan Password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">{{ __('Log in') }}</button>
                                    </div>
                                    
                                </div>
<!-- 
                                <div class="field-wrapper">
                                    <a href="{{ route('password.request') }}" class="forgot-pass-link">{{ __('Forgot Password?') }}</a>
                                </div> -->

                            </div>
                        </form>                        
                        <!-- <p class="terms-conditions">© 2020 All Rights Reserved. <a href="index.html">CORK</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p> -->

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image" style="background-image: url({{ asset('upload/pengaturan/'.$pengaturan->background_login) }});background-size: cover;">
            <!-- <div class="l-image" style="background-image: url('../img/3376592.jpg');background-size: cover;"> -->
            <!-- <p style="padding-top: 25%;color: white;font-weight: bold;font-size: 60px;text-align:center">Bombana <br>Whistleblowing <br>System</p> -->
            </div>
        </div>
    </div>

@endsection