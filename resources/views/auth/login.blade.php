<html>
<head><title>login</title></head>
<body>
@include('css')

<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Login</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{url('logn')}}">
        {{csrf_field()}}
        <div class="box-body">
            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control"
                       id="exampleInputEmail1"
                       placeholder="Enter email" value="{{old('email')}}">
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

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <a href="/register">register</a><br><br>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

    </form>
</div>
<!-- /.box -->

</body>
</html>