@extends('admin.admin-home')
@section('css')
    @include('admin.books-css')
@endsection
@section('content')
<div class="box box-primary">
    <h1>Add book</h1>
    <form action="/admin/books/create" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group col-md-4">
                <label >Name</label>
                <input name="name"
                       type="text" class="form-control"
                       placeholder="Enter name" value="{{old('name')}}">
            </div>
            <div class="form-group col-md-4">
                <label>Description</label>
                <input name="description"
                       type="text" class="form-control"
                       placeholder="Enter description"
                       value="{{old('description')}}"
                >
            </div>
            <div class="form-group col-md-4">
                <label>Price</label>
                <input name="price"
                       type="number" class="form-control"
                       placeholder="Enter price"
                        value="{{old('price')}}">
            </div>

            <div class="form-group col-md-4">
                @if(@$errors)
                    @foreach($errors->get('name') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group col-md-4">
                @if(@$errors)
                    @foreach($errors->get('description') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group col-md-4">
                @if(@$errors)
                    @foreach($errors->get('price') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group col-md-4">
                <label>Quantity</label>
                <input name="quantity"
                       type="number" class="form-control"
                       placeholder="Enter quantity"
                        value="{{old('quantity')}}">
            </div>
            <div class="form-group col-md-4">
                <label>Category</label>
                <select class="select-css" name="category">
                    @foreach(\App\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>upload photo</label>
                <input type="file" name="image" id="exampleInputFile">
            </div>
            <div class="form-group col-md-4">
                @if(@$errors)
                    @foreach($errors->get('quantity') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
@endsection