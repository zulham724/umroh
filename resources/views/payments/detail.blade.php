@extends('layouts.bookify')
@section('css')

@endsection
@section('content')
  <payment-detail-component :plan_id="{{ $plan->id }}"></payment-detail-component>
@endsection
@section('script')

@endsection