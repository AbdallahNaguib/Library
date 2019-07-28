@extends('admin.admin-home')
@section('css')
@include('admin.books-css')
@endsection
@section('content')

    <section class="content">
        <div class="box box-primary">
            <form action="/admin/books/create" method="get" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Add book</button>
                </div>
            </form>
        </div>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Books</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $item)
                        <tr>
                            <th>{{$item->name}}</th>
                            <th>{{$item->description}}</th>
                            <th>{{$item->price}}</th>
                            <th>{{$item->quantity}}</th>
                            <th>{{$item->created_at}}</th>
                            <th>{{$item->updated_at}}</th>
                            <th>
                                <form method="post" action="/admin/books/{{$item->id}}">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </form>
                            </th>
                            <th>
                                <form action="/admin/books/{{$item->id}}/edit" method="get">
                                    {{csrf_field()}}
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection
@section('script')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery 3 -->
    <script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('backend/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <script>
        $(function () {
            $('#example1').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        })
    </script>
@endsection