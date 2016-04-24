@extends('layouts.app')

@section('page-title')
    Falcon BookStore | Books
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- DIRECT CHAT -->
            <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Books</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="books_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author(s)</th>
                            <th>Genre(s)</th>
                            <th>Release Date</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author(s)</th>
                            <th>Genre(s)</th>
                            <th>Release Date</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!--/.box-body-->
            </div><!-- /.box -->
        </div>
        <!- /.col-md-6 -->
    </div><!-- /.row -->
    @endsection

    @section('footer-script')
            <!-- page script -->
    <script>
        $(document).ready(function () {
            $("#books_table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/mylist') }}",
                    dataSrc: 'data',
                },
                columns: [
                    {data: 'id'},
                    {data: 'title'},
                    {data: 'description'},
                    {data: 'title'},
                    {data: 'title'},
                    {data: 'release_date'},
                ],
            });
        });
    </script>

@endsection
