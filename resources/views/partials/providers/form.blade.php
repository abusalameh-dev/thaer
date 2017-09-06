{{ csrf_field() }}
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="name" class="col-md-3 control-label">اسم المزود</label>
		<div class="col-md-6">
			<input id="name" type="text" class="form-control" name="name" value="{{  $provider->name or old('name')   }}" />
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
		<label for="address" class="col-md-3 control-label">العنوان</label>
		<div class="col-md-6">
			<input id="address" type="text" class="form-control" name="address" value="{{ $provider->address or  old('address') }}"/>
			@if ($errors->has('address'))
			<span class="help-block">
				<strong>{{ $errors->first('address') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
		<label for="phone" class="col-md-3 control-label">رقم الهاتف</label>
		<div class="col-md-6">
			<input id="phone" type="text" class="form-control" name="phone" value="{{ $provider->phone or  old('phone') }}"/>
			@if ($errors->has('phone'))
			<span class="help-block">
				<strong>{{ $errors->first('phone') }}</strong>
			</span>
			@endif
		</div>
	</div>
	