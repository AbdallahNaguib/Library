@extends('admin.home')
@section('content')
    <div class="box box-primary">
        <h1>Update admin</h1>
        <form method="post" action="/admin/admins/{{$admin->id}}">
            {{method_field('patch')}}
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group col-md-4">
                    <label >Name</label>
                    <input name="name"
                           type="text" class="form-control"
                           value="{{$admin->name}}">
                </div>
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input name="email"
                           type="text" class="form-control"
                           value="{{$admin->email}}"
                    >
                </div>
                <div class="form-group col-md-4">
                    <label>Password</label>
                    <input name="password"
                           type="password" class="form-control"
                           placeholder="Enter password">
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
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection