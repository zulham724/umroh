@extends('layouts.ablepro')

@section('content')
<!-- Container-fluid starts -->
<div class="container-fluid">
   <!-- Row Starts -->
   <div class="row">
      <div class="col-sm-12 p-0">
         <div class="main-header">
            <h4>Sample page</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
               <li class="breadcrumb-item"><a href="index.html"><i class="icofont icofont-home"></i></a>
               </li>
               <li class="breadcrumb-item"><a href="#!">Pages</a>
               </li>
               <li class="breadcrumb-item"><a href="sample-page.html">Sample page</a>
               </li>
            </ol>
         </div>
      </div>
   </div>
   <!-- Row end -->
   <div class="row">
      <div class="col-md-12">
         <order-table-component></order-table-component>
      </div>
   </div>
</div>
<!-- Container-fluid ends -->
@endsection
@section('script')
<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
@endsection
