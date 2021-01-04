<div id="order{{$order->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Thông tin khách hàng mã đơn:{{$order->id}}</h5>
            </div>
            <div class="modal-body">
              <p>Khách hàng: {{$order->name}}</p>
              <p>Email: {{$order->email}}</p>
              <p>Số điện thoại: {{$order->phone}}</p>
              <p>Địa chỉ: {{$order->address}}</p>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th colspan="4" style="font-size: 17px;color: red;">Chi tiết đơn hàng</th>
                  </tr>
                  <tr>
                    <th>Sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($orderDetail as $value)
                  <tr>
                    <td>{{$value->product_name}}</td>
                    <td>{{$value->AttributeProducts()->first()->color}}</td>
                    <td>{{$value->qty}}</td>
                    <td>{{$value->product_price}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>