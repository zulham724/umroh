@extends('layouts.bookify')
@section('css')

@endsection
@section('content')
  {{-- {{ $errors ? dd($errors) : null }} --}}
  <payment-detail-component :plan_id="{{ $plan->id }}"></payment-detail-component>
@endsection
@section('script')
<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
@endsection