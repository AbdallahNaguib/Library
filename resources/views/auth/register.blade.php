<html>
<head><title>register</title></head>
<body>
@include('css')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Register</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="/regster" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label>Name</label>
                <input name="name" class="form-control" id="exampleInputEmail1"
                       placeholder="Enter name" value="{{old('name')}}">
                @if(@$errors)
                    @foreach($errors->get('name') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control"
                       id="exampleInputEmail1" placeholder="Enter email"
                        value="{{old('email')}}">
                @if(@$errors)
                    @foreach($errors->get('email') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @if(@$errors)
                    @foreach($errors->get('password') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @if(@$errors)
                    @foreach($errors->get('password') as $message)
                        <span class='help-inline text-danger'>{{ $message }}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label>upload profile picture</label>
                <input type="file" name="image" id="exampleInputFile">
            </div>
        </div>
        <div class="box-footer">
            <a href="/login">login</a><br><br>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
<!-- /.box -->

</body>
</html>