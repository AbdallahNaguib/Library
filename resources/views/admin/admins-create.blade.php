@extends('admin.admin-home')
@section('content')
<div class="box box-primary">
    <h1>Add admin</h1>
    <form action="/admin/admins/create" method="post"
          enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group col-md-4">
                <label >Name</label>
                <input name="name"
                       type="text" class="form-control" placeholder="Enter name"
                        value="{{old('name')}}">
            </div>

            <div class="form-group col-md-4">
                <label>Email</label>
                <input name="email"
                       type="text" class="form-control"
                       placeholder="Enter email" value="{{old('email')}}"
                >
            </div>

            <div class="form-group col-md-4">
                <label>Password</label>
                <input name="password"
                       type="password" class="form-control"
                       placeholder="Enter pasword">
            </div>

            <div class="col-md-4">
                @if(@$errors)
                    @foreach($errors->get('name') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-md-4">
                @if(@$errors)
                    @foreach($errors->get('email') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-md-4">
                @if(@$errors)
                    @foreach($errors->get('password') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>

            <div class="form-group">
                <label>upload photo</label>
                <input type="file" name="image" id="exampleInputFile">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
@endsection