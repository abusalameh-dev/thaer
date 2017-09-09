{{ csrf_field() }}
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="name" class="col-md-3 control-label">اسم التصنيف</label>
		<div class="col-md-6">
			<input id="name" type="text" class="form-control" name="name" value="{{  $category->name or old('name')   }}" />
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
	</div>
	