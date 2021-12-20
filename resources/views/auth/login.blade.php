@extends('layouts.app')

@section('content')
@php 
    $pengaturan = DB::table('pengaturan_tbl')->find(1);
@endphp

    <div class="form-container outer" style="background-image: url({{ asset('upload/pengaturan/'.$pengaturan->background_login) }});background-size: cover;">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <center><img src="{{ asset('upload/pengaturan/'.$pengaturan->logo_besar) }}" height="120px">
                        <form class="text-left" method="POST" action="{{ url('login-sistem') }}">
                        @csrf
                        
                            <div class="form">
                                <br>
                                @if ($message = Session::get('status'))
                                    <div class="alert alert-success mb-4" role="alert" style="margin-bottom: 0.5rem!important;"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button> 
                                        {{ $message }} 
                                    </div>
                                @elseif ($message = Session::get('status2'))
                                    <div class="alert alert-danger mb-4" role="alert" style="margin-bottom: 0.5rem!important;"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button> 
                                        {{ $message }} 
                                    </div>
                                @endif
                                
                                <div id="username-field" class="field-wrapper input">
                                    
                                    <label for="username">Nama User</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="username" name="name" type="text" class="form-control" placeholder="NIK" :value="old('name')">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                </div>

                                <p class="signup-link"></p>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection