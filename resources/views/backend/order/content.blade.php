<table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>Mã hóa đơn</th>
            <th>Mã khách hàng</th>
            <th>Hình thức thanh toán</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Phí ship</th>
            <th>Tổng tiền</th>
            <th>Ngày đặt</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$value->customer_id}}</td>
                <td>@if($value->payment!=0) Trực tuyến @else Ship COD @endif</td>
                <td>{{$value->note}}</td>
                <td style="width: 125px;">
                    <select class="form-control" style="width: 125px;" onchange="changeStatus(<?php echo $value->id; ?>)" id="change-status{{$value->id}}">
                        @if($value->status==0&&$value->payment==0)
                            <option selected disabled="">Chưa duyệt</option>
                            <option value="1">Duyệt đơn</option>
                        @elseif($value->status==1)
                            <option disabled="" selected>Đang giao</option>
                            <option value="2">Hoàn thành</option>
                        @elseif($value->status==2)
                            <option selected>Hoàn thành</option>
                        @else
                            <option selected>Thất bại</option>
                        @endif
                    </select>
                </td>
                <td>{{number_format($value->price_ship,0,".",".")}}<sup>đ</sup></td>
                <td>{{number_format($value->total_price,0,".",".")}}<sup>đ</sup></td>
                <td>{{date_format(new DateTime($value->created_at),'d-m-Y H:i')}}</td>
                <td style="width: 95px;">
                    <a href="#" onclick="infomationCustomer(<?php echo $value->id; ?>)" class="btn btn-icon waves-effect waves-light btn-warning" title="Chi tiết đơn hàng"><i class="fa fa-wrench"></i></a>
                    <a href="{{route('order.delete',['id'=>$value->id])}}" onclick="confirm('Bạn muốn xóa đơn hàng này?');" class="btn btn-icon waves-effect waves-light btn-danger" title="Xóa đơn hàng"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
