@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
	.box-product{
		display: flex;
  		flex-wrap: wrap;
	}
	.box-product > .attribute{
		background-color: #f1f1f1;
		width: 85px;
		margin-right: 10px;
		margin-bottom: 10px;
		text-align: center;
		line-height: 30px;
		font-size: 12px;
	}
	.linked-price{
		color: red;
	}
	.attribute-color{
		color: black;
		word-wrap: normal;
	}
</style>
@endsection
@section('header')
    @include('frontend.header.header_master')
@endsection
@section('categories')
    @include('frontend.categories.categories_master')
@endsection

@section('content')

@include('frontend.home.content_product')

@include('frontend.home.content_seller')

<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-center">
      <div class="modal-body">
        <i class="fa fa-check" style="color: rgb(102, 204, 0);font-size:50px;"></i>
        <p id="render-modal"></p>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')

<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script src="{{asset('frontend/ajax/quickview.js')}}"></script>
<script src="{{asset('frontend/ajax/wish.js')}}"></script>
@endsection