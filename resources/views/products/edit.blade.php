@extends('layouts.app')
@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection
@section('heading')
تعديل بيانات المنتج ( {{ $product->name }} )
@endsection
@section('content')
{{-- {{ }} --}}
<form class="form-horizontal" method="POST" action="{{ route('products.update', ['id' => $product->id ]) }}"  enctype="multipart/form-data" onsubmit="$('.loading').show()">
	{{ method_field('PATCH') }}
	@include('partials.products.form')
	@if ($product->image)
	<div class="row">
		<h4 class="text-info text-center">الصورة الحالية</h4>
	  	<div class="col-sm-6 col-md-6 col-md-offset-3">
	    	<div class="thumbnail">
	      		<img src="{{ $product->getImagePath() }}" class="img-thumbnail" data-id="{{ !is_null($product->image) ? $product->image->id : -1}}" style="width: 50%;height: 50%">
	    	</div>
	  	</div>
	</div>
	@endif
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-success">
			تعديل
			</button>
			<a class="btn btn-primary" href="{{ route('products.index') }}">
				الغاء
			</a>
		</div>
	</div>
</form>
@endsection
@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
	<script type="text/javascript">
		var providers = {!! json_encode($providers) !!};
		var categories = {!! json_encode($categories) !!};
		var provider = {{ $product->provider_id }}
		var category = {{ $product->category_id }}
		

		$('#provider_id').select2({
			data: providers,
			dir: "rtl",
			theme: "classic"
		});

		$('#category_id').select2({
			data: categories,
			dir: "rtl",
			theme: "classic"
		});

		$("#provider_id").val(provider).trigger("change");
		
		$("#category_id").val(category).trigger("change");

	</script>
@endpush