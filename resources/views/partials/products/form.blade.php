@include('partials.loader')
{{ csrf_field() }}
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="name" class="col-md-3 control-label">اسم المنتج</label>
		<div class="col-md-6">
			<input id="name" type="text" class="form-control" name="name" value="{{  $product->name or old('name')   }}" />
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('origin_price') ? ' has-error' : '' }}">
		<label for="origin_price" class="col-md-3 control-label">سعر التكلفة</label>
		<div class="col-md-6">
			<input min="0" type="number" step="any"  id="origin_price"  class="form-control" name="origin_price" value="{{  $product->origin_price or old('origin_price') }}" />
			@if ($errors->has('origin_price'))
			<span class="help-block">
				<strong>{{ $errors->first('origin_price') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('sell_price') ? ' has-error' : '' }}">
		<label for="sell_price" class="col-md-3 control-label">سعر البيع</label>
		<div class="col-md-6">
			<input min="0" type="number" step="any"  id="sell_price"  class="form-control" name="sell_price" value="{{ $product->sell_price or old('sell_price')   }}" />
			@if ($errors->has('sell_price'))
			<span class="help-block">
				<strong>{{ $errors->first('sell_price') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('provider_id') ? ' has-error' : '' }}">
		<label for="provider_id" class="col-md-3 control-label">المزود</label>
		<div class="col-md-6">
			<select id="provider_id" class="form-control" name="provider_id" style="height: 45px;">
				<option selected>-- اختر --</option>
			</select>
			@if ($errors->has('provider_id'))
			<span class="help-block">
				<strong>{{ $errors->first('provider_id') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
		<label for="category_id" class="col-md-3 control-label">التصنيف</label>
		<div class="col-md-6">
			<select id="category_id" class="form-control" name="category_id" style="height: 45px;">
				<option selected>-- اختر --</option>
			</select>
			@if ($errors->has('category_id'))
			<span class="help-block">
				<strong>{{ $errors->first('category_id') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
		<label for="image" class="col-md-3 control-label">صورة المنتج</label>
		<div class="col-md-6">
			<input id="image" type="file" class="form-control" name="image">
			@if ($errors->has('image'))
			<span class="help-block">
				<strong>{{ $errors->first('image') }}</strong>
			</span>
			@endif
		</div>
	</div>