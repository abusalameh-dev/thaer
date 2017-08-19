@extends('layouts.app')
@section('styles')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection
@section('heading')
اضافة صنف جديد
@endsection
@section('content')
<form class="form-horizontal" method="POST" action="{{ route('products.store') }}"  enctype="multipart/form-data">
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
		var data = {!! json_encode($providers) !!};

		$('#provider_id').select2({
			data: data,
			dir: "rtl",
			theme: "classic"

		});
	</script>
@endpush