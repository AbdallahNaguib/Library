<link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
<div class="row">
    <div class="col-md-12">
        <!-- Box Comment -->
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="{{asset('uploads/users/'.\App\Admin::find($book->admin_id)->image)}}" alt="User Image">
                    <span class="username"><a href="#">{{\App\Admin::find($book->admin_id)->name}}</a></span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h1>{{$book->name}}</h1>
                <img class="img-responsive pad" src="{{asset("uploads/books/".$book->image)}}" alt="Photo">
                <form method="post" action="/books/{{$book->id}}/like">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i>
                        @if(\Illuminate\Support\Facades\Auth::user()->hasLiked($book->id))
                            unlike
                        @else
                            like
                        @endif
                    </button>
                </form>
                <span class="pull-right text-muted">{{$book->likes->count()}} likes - {{$book->comments->count()}} comments</span>
                @if($book->quantity > 0)
                <form method="get" action="/books/{{$book->id}}/show">
                    {{csrf_field()}}
                        <input type="submit" value="order">
                </form>
                @else
                    out of stock
                @endif
            <!-- /.box-body -->
            <div class="box-footer box-comments">
                @each('_comment',$book->comments,'comment')
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <form action="/books/{{$book->id}}/comment" method="post">
                    {{csrf_field()}}
                    <img class="img-responsive img-circle img-sm" src="{{asset("uploads/users/".Auth::user()->image)}}" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input name="content" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                        <input type="submit" hidden>
                    </div>
                </form>
            </div>

            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div></div>