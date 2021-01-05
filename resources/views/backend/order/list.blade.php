@extends('backend.master')

@section('css')
<style type="text/css">
    .button-add{
        margin-left: 78%;
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
<div class="row">
    <div class="col-12">
        @if(Session::has('success'))
            <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-check-all mr-2"></i>
                <strong>{{Session::get('success')}}</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách chi tiết sản phẩm</b></h4>
                <div class="button-export">
                    <a href="{{url('/admin/order/list?type_excel=xlsx')}}" class="btn btn-primary waves-effect waves-light ">Export excel</a>
                </div>
                <div class="button-add">
                    <select class="form-control" id="filter-status" onchange="filterStatus()">
                        <option value="4">Tất cả đơn hàng</option>
                        <option value="0">Đơn hàng chưa duyệt</option>
                        <option value="1">Đơn hàng đang giao</option>
                        <option value="2">Đơn hàng hoàn thành</option>
                        <option value="3">Đơn hàng thanh toán thất bại</option>
                    </select>
                </div>
                <div id="render-order">
                    @include('backend.order.content')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end row -->
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

<div id="render-customer">
    
</div>
@endsection

@section('js')
<script src="{{asset('frontend\js\vendor\jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend\ajax\order.js')}}"></script>
@endsection