@extends('admin.home')
@section('css')
    @include('admin.books.css')
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
                </div><div class="form-group col-md-4">
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
                           value="{{$book->quantity}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Category</label>
                    <select class="select-css" name="category">
                        @foreach(\App\Category::all() as $category)
                            @if($book->category_id == $category->id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    @if(@$errors)
                        @foreach($errors->get('quantity') as $message)
                            <span class='help-inline text-danger'>{{ $message }}</span>
                        @endforeach
                    @endif
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection