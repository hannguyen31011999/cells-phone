<table>
    <thead>
        <tr>
            <th>Mã hóa đơn</th>
            <th>Mã khách hàng</th>
            <th>Email</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Ghi chú</th>
            <th>Trạng thái</th>
            <th>Phí ship</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->customer_id}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->phone}}</td>
            <td>{{$value->address}}</td>
            <td>{{$value->note}}</td>
            <td>
                @if($value->status==0)
                    Chưa duyệt
                @elseif($value->status==1)
                    Đang giao
                @elseif($value->status==2)
                    Hoàn thành
                @else
                    Thất bại
                @endif
            </td>
            <td>{{$value->price_ship}}</td>
            <td>{{$value->total_price}}</td>
            <td>{{$value->created_at}}</td>
            <td>{{$value->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
