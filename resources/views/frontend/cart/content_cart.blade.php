@if(Session::has('cart'))
    @foreach(Session::get('cart')->products as $key => $cart)
    <tr>
        <td class="product-thumbnail">
            <a href="#"><img src="{{asset('backend/attribute_img/'.$cart['image'])}}" title="{{$cart['productName']}}" alt="{{$cart['productName']}}"></a>
        </td>
        <td class="product-name"><a href="#">{{$cart['productName']}}</a></td>
        <td class="product-name"><a href="#">{{$cart['color']}}</a></td>
        <td class="product-price"><span class="amount">{{number_format($cart['price'],0,".",".")}}<sup>đ</sup></span></td>
        <td class="product-quantity"><input type="number" value="{{$cart['qty']}}" min="1" id="change-quantity{{$key}}" name="changeQuantity" data-id="{{$key}}"></td>
        <td class="product-price"><span class="amount" id="render-discount{{$key}}">{{number_format($cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
        <td class="product-subtotal"><span id="render-subtotal{{$key}}" >{{number_format(($cart['price']*$cart['qty'])-$cart['discount'],0,".",".")}}<sup>đ</sup></span></td>
        <td class="product-remove"> <a href="#" id="delete-cart" data-id="{{$key}}" onclick="confirm('Bạn muốn xóa sản phẩm này không?')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="8" style="font-size: 20px;">Giỏ hàng đang trống</td>
    </tr>
@endif
