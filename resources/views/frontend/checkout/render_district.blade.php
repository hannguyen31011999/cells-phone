<select class="form-control" name="district" id="choose-district">
	@if(isset($district))
		@foreach($district as $districts)
			<option value="{{$districts->id}}">{{$districts->name}}</option>
		@endforeach
	@endif
</select>