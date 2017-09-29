@extends('layouts.app')
@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<style type="text/css">
		/* Absolute Center Spinner */
	</style>
@endsection
@section('heading')
اضافة منتج جديد
@endsection
@section('content')

<form class="form-horizontal" method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data" onsubmit="$('.loading').show()">
	@include('partials.products.form')
	<div class="form-group">
		<div class="col-md-8 col-md-offset-3">
			<button type="submit" class="btn btn-success">
			حفظ
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
	</script>
@endpush