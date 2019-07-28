@extends('admin.admin-home')
@section('content')
    <div class="box box-primary">
        <h1>Update category</h1>
        <form method="post" action="/admin/admins/{{$category->id}}">
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
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection