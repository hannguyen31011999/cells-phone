@extends('backend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
    .button-add{
        margin-left: 91%;
        margin-bottom: 5px;
    }

    .tag-li-product{
        background: #D3D3D3;
        color: red;
        list-style-type: none;
    }
    .title_product{
        margin-left: 10px;
        font-size: 17px;
    }
</style>
@endsection
@section('content')
<br></br>
<form action="" method="POST" id="submit-doanhthu">
    @csrf
    <label>Chọn năm</label>
    <br>
    <select class="custom-select" id="doanh-thu" name="list-order" style="width:100px;"></select>
    <br>
    <label style="margin-top: 5px;">Chọn tháng</label>
    <br>
    <select class="custom-select" id="doanh-thu-month" name="list-order" style="width:100px;">
        <option>
            Tháng
        </option>
    </select>
    <button class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
</form>
<br></br>
<div id="container" data-order="{{ $revenue }}">
</div>
@endsection

@section('js')
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="{{asset('backend\ajax\statistical_user.js')}}"></script>
@endsection