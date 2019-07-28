@extends('layouts.layout')

@section('content')
    @each('__post',$books,'book');
@endsection
@push('sidebar')
    <li><a href="/">home</a></li>
    <li><a href="/orders">my orders</a></li>
@endpush
