@extends('admin.home')
@section('css')
    @include('admin.books.css')
@endsection
@section('content')
    <div class="box box-primary">
        <h1>Update category</h1>
        <form method="post" action="/admin/categories/{{$category->id}}">
            {{method_field('patch')}}
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group col-md-4">
                    <label >Name</label>
                    <input name="name"
                           type="text" class="form-control"
                           value="{{$category->name}}">
                </div>
            </div>
            <div class="col-md-4">
                @if(@$errors)
                    @foreach($errors->get('name') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection