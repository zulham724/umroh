@extends('layouts.bookify')

@section('css')

@endsection

@section('content')
<div class="container" style="min-height: 60vh">
	<div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
	        <br><br> <h2 style="color:#0fad00">Success</h2>
	        <i class="fa fa-check fa-5x" style="color:#0fad00"></i>
	        <h3>Dear, {{ $user->name }}</h3>
	        <p style="font-size:20px;color:#5C5C5C;">
	        	Terimakasih telah melakukan pemesanan. Silahkan cek status pembayaran dan tagihannya <a href="{{ route('dashboard') }}">disini</a>. Atau cek Email anda.
			</p>
	    	<br><br>
        </div>
        
	</div>
</div>
@endsection

@section('script')

@endsection