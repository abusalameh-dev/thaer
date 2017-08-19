@extends('layouts.app')

@section('heading')
    لوحة التحكم
@endsection
@section('content')
    أهلاً بك يا - {{ auth()->user()->name }}
@endsection
