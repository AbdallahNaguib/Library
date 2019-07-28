@extends('admin.admin-home')
@section('css')
    @include('admin.books-css')
@endsection
@section('content')
    <div class="box box-primary">
        <h1>Update book</h1>
        <form action="/admin/books/{{$book->id}}" method="post" enctype="multipart/form-data">
            {{method_field('patch')}}
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group col-md-4">
                    <label >Name</label>
                    <input name="name"
                           type="text" class="form-control"
                           value="{{$book->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Description</label>
                    <input name="description"
                           type="text" class="form-control"
                           value="{{$book->description}}"
                    >
                </div>
                <div class="form-group col-md-4">
                    <label>Price</label>
                    <input name="price"
                           type="number" class="form-control"
                           value="{{$book->price}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Quantity</label>
                    <input name="quantity"
                           type="number" class="form-control"
                           value="{{$book->quantity}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Category</label>
                    <select class="select-css" name="category">
                        @foreach(\App\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection