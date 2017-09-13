@extends('layouts.app')
@section('heading')
تعديل بيانات المورد ( {{ $provider->name }} )
@endsection
@section('content')

<form class="form-horizontal" method="POST" action="{{ route('provider.update', ['id' => $provider->id ]) }}"  onsubmit="$('.loading').show()">
	{{ method_field('PATCH') }}
	@include('partials.providers.form')
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-success">
			تعديل
			</button>
			<a class="btn btn-primary" href="{{ route('provider.index') }}">
				الغاء
			</a>
		</div>
	</div>
</form>
@endsection
