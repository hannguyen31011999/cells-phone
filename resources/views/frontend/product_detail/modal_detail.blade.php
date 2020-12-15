@if(isset($products))
<div id="detailProduct" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Sản phẩm @if(isset($name)){{$name}}@endif</h5>
            </div>
            <div class="modal-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th colspan="3" style="font-size: 17px;color: red;">Chi tiết sản phẩm</th>
                </div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Nhà sản xuất:</td>
                    <td colspan="2">
                        @foreach($categories as $cate)
                            @if($cate->id==$products->categories_id)
                                {{$cate->categories_name}}
                            @endif
                        @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>Màn hình rộng:</td>
                    <td colspan="2">{{$products->screen}} inch</td>
                  </tr>
                  <tr>
                    <td>Độ phân giải:</td>
                    <td colspan="2">{{$products->screen_resolution}}</td>
                  </tr>
                  <tr>
                    <td>Hệ điều hành:</td>
                    <td colspan="2">{{$products->operating_system}}</td>
                  </tr>
                  <tr>
                    <td>Chip xử lý:</td>
                    <td colspan="2">{{$products->cpu}}</td>
                  </tr>
                  <tr>
                    <td>Chip đồ họa:</td>
                    <td colspan="2">{{$products->gpu}}</td>
                  </tr>
                  <tr>
                    <td>Dung lượng ram:</td>
                    <td colspan="2">{{$products->ram}}GB</td>
                  </tr>
                  <tr>
                    <td>Camera trước:</td>
                    <td colspan="2">{{$products->camera_fr}}</td>
                  </tr>
                  <tr>
                    <td>Camera sau:</td>
                    <td colspan="2">{{$products->camera_ba}}</td>
                  </tr>
                  <tr>
                    <td>Quay video:</td>
                    <td colspan="2">{{$products->video}}</td>
                  </tr>
                  <tr>
                    <td>Dung lượng pin:</td>
                    <td colspan="2">{{$products->pin}}mAh</td>
                  </tr>
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
@endif