<!-- info customer -->
<div class="col-lg-12">
    <div class="row px-6">
        <div class="form-group col-md-6"> 
            <label class="form-control-label">Họ tên khách hàng</label> 
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập đầy đủ họ tên" value="{{old('name')}}">
            <div class="messenger-errors">
                @if($errors->has('name'))
                    {{$errors->first('name')}}
                @endif
            </div>
        </div>
        <div class="form-group col-md-6"> 
          <label class="form-control-label">Địa chỉ email</label> 
          <input type="text" class="form-control" id="email" name="email" placeholder="Email của khách hàng" value="{{old('email')}}">
          <div class="messenger-errors">
                @if($errors->has('email'))
                    {{$errors->first('email')}}
                @endif
            </div>
        </div>
    </div>
    <div class="row px-6">
        <div class="form-group col-md-6"> 
          <label class="form-control-label">Số điện thoại</label> 
          <input type="text" class="form-control"  name="phone" placeholder="Số điện thoại khách hàng" value="{{old('phone')}}">
          <div class="messenger-errors">
                @if($errors->has('phone'))
                    {{$errors->first('phone')}}
                @endif
            </div>
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
                <div class="messenger-errors">
                @if($errors->has('province'))
                    {{$errors->first('province')}}
                @endif
            </div>
              </div>
              <div class="form-group col-md-4" id="form-district"> 
                <label class="form-control-label">Quận/Huyện</label>
                <div id="render-district">
                    <select class="form-control" name="district" id="choose-district">
                    </select>
                    <div class="messenger-errors">
                        @if($errors->has('district'))
                            {{$errors->first('district')}}
                        @endif
                    </div>
                </div>
              </div>
              <div class="form-group col-md-4"> 
                <label class="form-control-label">Phường/Xã</label>
                <div id="render-ward">
                    <select class="form-control" name="ward" id="choose-ward">
                    </select>
                    <div class="messenger-errors">
                        @if($errors->has('ward'))
                            {{$errors->first('ward')}}
                        @endif
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <div class="row px-12">
        <div class="form-group col-md-12">
            <label class="form-control-label">Địa chỉ cụ thể</label> 
            <input type="text" class="form-control" id="exp" name="address" placeholder="Địa chỉ cụ thể khách hàng" value="{{old('address')}}">
            <div class="messenger-errors">
                @if($errors->has('address'))
                    {{$errors->first('address')}}
                @endif
            </div>
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