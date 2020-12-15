@if(Session::has('wish'))
    @foreach(Session::get('wish')->products as $key => $value)
        <tr>
            <td class="product-remove"> <a href="{{url('wish-list?delete='.$key)}}"  onclick="confirm('Bạn muốn xóa sản phẩm yêu thích này?');"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            <td class="product-thumbnail">
                <a href="#"><img src="{{asset('backend/product_img/'.$value['image'])}}" id="attribute-img{{$key}}" alt="cart-image"></a>
            </td>
            <td class="product-name"><a href="#">{{$value['productName']}}</a></td>
            <td class="product-price"><span class="amount" id="amount{{$key}}">{{number_format($value['price'],0,".",".")}} <sup>đ</sup></span></td>
            <td class="product-stock-status">
                <select name="attribute-color" id="choose-color{{$key}}" onchange="changeAttribute(<?php echo $key ?>)" data-select="{{$key}}">
                    <option value="">Chọn màu bạn thích</option>
                    @foreach($value['color'] as $keyAttr => $valueAttr)
                        <option value="{{$valueAttr->id}}">{{$valueAttr->color}}</option>
                    @endforeach
                </select>
            </td>
            <td class="product-add-to-cart"><a href="#" id="add-cart{{$key}}" onclick="addCart(<?php echo $key ?>)" data-id="">Thêm giỏ hàng</a></td>
        </tr>
    @endforeach
@else
    <tr>
        <th colspan="6">
            Danh sách yêu thích đang trống
        </th>
    </tr>
@endif