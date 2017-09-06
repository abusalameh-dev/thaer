@extends('layouts.app')
@section('heading')
	اضافة صنف جديد
@endsection
@section('content')
<form class="form-horizontal" method="POST" action="{{ route('provider.store') }}"  >
	@include('partials.providers.form')
	<div class="form-group">
		<div class="col-md-8 col-md-offset-3">
			<button type="submit" class="btn btn-success">
			حفظ
			</button>
			<a class="btn btn-primary" href="{{ route('provider.index') }}">
				الغاء
			</a>
		</div>
	</div>
</form>
@endsection
