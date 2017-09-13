@extends('layouts.app')
@section('heading')
تعديل بيانات التصنيف ( {{ $category->name }} )
@endsection
@section('content')

<form class="form-horizontal" method="POST" action="{{ route('category.update', ['id' => $category->id ]) }}"  onsubmit="$('.loading').show()">
	{{ method_field('PATCH') }}
	@include('partials.categories.form')
	<div class="form-group">
		<div class="col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-success">
			تعديل
			</button>
			<a class="btn btn-primary" href="{{ route('category.index') }}">
				الغاء
			</a>
		</div>
	</div>
</form>
@endsection
