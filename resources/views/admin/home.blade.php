@extends('layouts.layout')
@section('content')

@endsection
@push('sidebar')
    <li><a href="/admin">dashboard</a></li>
    <li><a href="/admin/users">Visitors</a></li>
    <li><a href="/admin/admins">Admins</a></li>
    <li><a href="/admin/categories">Categories</a></li>
    <li><a href="/admin/books">Books</a></li>
@endpush