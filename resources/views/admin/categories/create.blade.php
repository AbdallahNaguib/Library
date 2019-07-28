@extends('admin.home')
@section('css')
    @include('admin.books.css')
@endsection
@section('content')
<div class="box box-primary">
    <h1>Add category</h1>
    <form action="/admin/categories/create" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group col-md-4">
                <label >Name</label>
                <input name="name"
                       type="text" class="form-control"
                       placeholder="Enter name" value="{{old('name')}}">
            </div>
            <div class="col-md-4">
                @if(@$errors)
                    @foreach($errors->get('name') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
    @endsection