<!-- Quick View Content Start -->
<div class="main-product-thumbnail quick-thumb-content">
    <div class="container">
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <div style="float: left;margin-bottom: 5px;">
                                    <h6>Mã đơn hàng:{{$order->id}}</h6>
                                    <h6>Ngày đặt hàng:{{date_format(new DateTime($order->created_at),"d-m-Y")}}</h6>
                                </div>
                                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng</th>
                                            <th>Khuyến mãi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetail as $value)
                                        <tr>
                                            <td>{{$value->attribute_product_id}}</td>
                                            <td>{{$value->product_name}}</td>
                                            <td>{{number_format($value->product_price,0,".",".")}}<sup>đ</sup></td>
                                            <td>{{$value->qty}}</td>
                                            <td>{{number_format($value->discount,0,".",".")}}<sup>đ</sup></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Content End -->