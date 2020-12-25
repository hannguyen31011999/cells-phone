<!-- info customer -->
<div class="col-lg-12">
    <div class="row px-12">
        <div class="form-group col-md-12">
            <label class="form-control-label">Địa chỉ giao nhận hàng</label> 
            <input type="text" class="form-control" id="exp" name="address" placeholder="Địa chỉ cụ thể khách hàng" value="{{Auth::User()->address}}" disabled>
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