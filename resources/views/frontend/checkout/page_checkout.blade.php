@extends('frontend.master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
  body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #fff;
    background-repeat: no-repeat
}

.book {
    margin: 20px 15px 5px 15px
}

.border-top {
    border-top: 1px solid #EEEEEE !important;
    margin-top: 20px;
    padding-top: 15px
}

.card {
    margin: 40px 0px;
    padding: 40px 50px;
    border-radius: 20px;
    border: none;
    box-shadow: 1px 5px 10px 1px rgba(0, 0, 0, 0.2)
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.pay {
    width: 80px;
    height: 40px;
    border-radius: 5px;
    border: 1px solid #673AB7;
    margin: 10px 20px 10px 0px;
    cursor: pointer;
    box-shadow: 1px 5px 10px 1px rgba(0, 0, 0, 0.2)
}

.gray {
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%);
    color: #E0E0E0
}

.gray .pay {
    box-shadow: none
}

#tax {
    border-top: 1px lightgray solid;
    margin-top: 10px;
    padding-top: 10px
}

.btn-blue {
    border: none;
    border-radius: 10px;
    background-color: #673AB7;
    color: #fff;
    padding: 8px 15px;
    margin: 20px 0px;
    cursor: pointer
}

.btn-blue:hover {
    background-color: #311B92;
    color: #fff
}

#checkout {
  text-align: center;
}

#check-amt {
    float: right
}

@media screen and (max-width: 768px) {

    .book,
    .book-img {
        width: 200px;
        height: 50px
    }

    .card {
        padding-left: 15px;
        padding-right: 15px
    }

    .mob-text {
        font-size: 13px
    }

    .pad-left {
        padding-left: 20px
    }
}

.custom-style .current {
  width: 110px;
  display: inline-block;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}s
</style>
@endsection

@section('header')
    @include('frontend.header.header_master')
@endsection

@section('categories')
    @include('frontend.categories.categories_none')
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="active"><a href="#">Thanh toán</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- content checkout -->
<div class="container px-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h4 class="heading">Chi tiết đơn hàng</h4>
        </div>
        <div class="col-7">
        </div>
    </div><br>
    <!-- order -->
    <div style="max-height: 450px;overflow: auto;">
        <div class="table-content table-responsive mb-45">
          <table>
            <thead>
                <tr>
                    <th class="product-thumbnail">Hình ảnh</th>
                    <th class="product-name">Tên sản phẩm</th>
                    <th class="product-name">Màu sắc</th>
                    <th class="product-price">Giá tiền</th>
                    <th class="product-quantity">Số lượng</th>
                    <th class="product-price">Khuyến mãi</th>
                    <th class="product-subtotal">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
              @if(Session::has('cart'))
                  @foreach(Session::get('cart')->products as $key => $cart)
                  <tr>
                      <td class="product-thumbnail">
                          <a href="#"><img src="{{asset('backend/attribute_img/'.$cart['image'])}}" title="{{$cart['productName']}}" alt="{{$cart['productName']}}"></a>
                      </td>
                      <td class="product-name"><a href="#">{{$cart['productName']}}</a></td>
                      <td class="product-name"><a href="#">{{$cart['color']}}</a></td>
                      <td class="product-price"><span class="amount">{{number_format($cart['price'],0,".",".")}}<sup>đ</sup></span></td>
                      <td class="product-quantity"><input type="number" value="{{$cart['qty']}}" style="text-align: center;" disabled></td>
                      <td class="product-price"><span class="amount">{{number_format($cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
                      <td class="product-subtotal"><span>{{number_format(($cart['price']*$cart['qty'])-$cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
                  </tr>
                  @endforeach
              @endif
            </tbody>
          </table>
        </div>
    </div>
    <!-- end order -->
    <br></br>
    
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h4 class="heading">Thông tin giao nhận</h4>
        </div>
        <div class="col-7">
        </div>
    </div>

    <!-- info customer -->
    <div class="row justify-content-center">
      <form action="" method="post">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <!-- info customer -->
                    <div class="col-lg-12">
                        <div class="row px-6">
                            <div class="form-group col-md-6"> 
                              <label class="form-control-label">Họ tên khách hàng</label> <input type="text" class="form-control" id="name" name="name" placeholder="Nhập đầy đủ họ tên"> 
                            </div>
                            <div class="form-group col-md-6"> 
                              <label class="form-control-label">Địa chỉ email</label> 
                              <input type="text" class="form-control" id="email" name="email" placeholder="Email của khách hàng"> 
                            </div>
                        </div>
                        <div class="row px-6">
                            <div class="form-group col-md-6"> 
                              <label class="form-control-label">Số điện thoại</label> 
                              <input type="text" class="form-control"  name="phone" placeholder="Số điện thoại khách hàng"> 
                            </div>
                            <div class="form-group col-md-6">
                              <div class="row">
                                  <div class="form-group col-md-4"> 
                                    <label class="form-control-label">TP/Tỉnh</label> 
                                    <select class="form-control" name="province" id="choose-province">
                                        <option>-- Chọn TP/Tỉnh --</option>
                                        @foreach($province as $provinces)
                                          <option value="{{$provinces->id}}">
                                            {{$provinces->name}}
                                          </option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group col-md-4" id="form-district"> 
                                    <label class="form-control-label">Quận/Huyện</label>
                                    <div id="render-district">
                                        <select class="form-control" name="district" id="choose-district">
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-4"> 
                                    <label class="form-control-label">Phường/Xã</label>
                                    <div id="render-ward">
                                        <select class="form-control" id="choose-ward">
                                        </select>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="row px-12">
                            <div class="form-group col-md-12">
                                <label class="form-control-label">Địa chỉ cụ thể</label> 
                                <input type="text" class="form-control" id="exp" name="exp" placeholder="Địa chỉ cụ thể khách hàng"> 
                            </div>
                        </div>
                        <div class="row px-12">
                            <div class="form-group col-md-12">
                                <label class="form-control-label">Ghi chú</label> 
                                <textarea class="form-control" rows="5" name="note">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end info customer -->
                    <!-- payment -->
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 radio-group">
                        <input type="hidden" name="payment" value="0" id="choose-payment">
                        <div class="row d-flex px-3 radio" payment="0"><img class="pay" src="{{asset('frontend/shipper.jpg')}}">
                            <p class="my-auto">Thanh toán khi nhận</p>
                        </div>
                        <div class="row d-flex px-3 radio gray" payment="1"> <img class="pay" src="{{asset('frontend/vnpay.png')}}">
                            <p class="my-auto">Thanh toán qua VNPay</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Thành tiền</p>
                            @if(Session::has('cart'))
                                <h6 class="mb-1 text-right">
                                    {{
                                        number_format(Session::get('cart')->totalPrice,0,".",".")
                                    }}<sup>đ</sup>
                                </h6>
                            @endif
                        </div>
                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Phí Ship</p>
                            <h6 class="mb-1 text-right" id="render-ship">0<sup>đ</sup></h6>
                        </div>
                        <div class="row d-flex justify-content-between px-4" id="tax">
                            <p class="mb-1 text-left">Tổng tiền</p>
                            <h6 class="mb-1 text-right" id="render-totalPrice">0<sup>đ</sup></h6>
                        </div><button type="submit" class="btn-block btn-blue"><span><span id="checkout">Tiến hành thanh toán</span></span></button>
                    </div>
                    <!-- end payment -->
                </div>
            </div>
        </div>
      </form>
    </div>
    <!-- end info customer -->
</div>
<!-- end content checkout -->
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
<script src="{{asset('js\jquery.min.js')}}"></script>
<script src="{{asset('frontend/ajax/cart.js')}}"></script>
<script>
function changeWard()
{
    var id_district = document.getElementById("choose-district").value;
    $.ajax({
        type: 'get',
        url: '/shopping-cart/checkout',
        data: {
          "id_district":id_district
        },
        success: function(response) {
            $('#render-ward').empty().html('<select class="form-control" name="district" id="choose-ward" onchange="priceShipping()"></select>');
            $('#choose-ward').append('<option value="">-- Chọn Phường/Xã --</option>');
            $.each(response.ward, function(key, value){
                $('#choose-ward').append('<option value="'+value.id+'">'+value.name+'</option>');
            });
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}

function priceShipping()
{
    var id_ward = document.getElementById("choose-ward").value;
    $.ajax({
        type: 'get',
        url: '/shopping-cart/checkout',
        data: {
          "id_ward":id_ward
        },
        success: function(response) {
            $('#render-ship').text(response.priceShip.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
            $('#render-totalPrice').text(response.totalPrice.toLocaleString('vi-VN', {style: 'currency',currency:'VND'}));
        },
        error: function (response) {
            alert('Đã xảy ra lỗi! xin thử lại');
        }
    });
}

$(document).ready(function(){
    $('.radio-group .radio').click(function(){
        $('.radio').addClass('gray');
        $(this).removeClass('gray');
        var payment = $(this).attr('payment');
        $('#choose-payment').val(payment);
    });


    $('#choose-province').on('change',function(e){
        var id_province= $("#choose-province option:selected").val();
        $.ajax({
            type: 'get',
            url: '/shopping-cart/checkout',
            data: {
              "id_province":id_province
            },
            success: function(response) {
                $('#render-district').empty().html('<select class="form-control" name="district" id="choose-district" onchange="changeWard()"></select>');
                $('#choose-district').append('<option value="">-- Chọn Quận/Huyện --</option>');
                $.each(response.district, function(key, value){
                    $('#choose-district').append('<option value="'+value.id+'">'+value.name+'</option>');
                });
            },
            error: function (response) {
                alert('Đã xảy ra lỗi! xin thử lại');
            }
        });
        e.preventDefault();
    });
});

</script>
@endsection