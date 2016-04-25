@extends('layouts.app')

@section('page-title')
    Falcon BookStore | Create New Book
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Books</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ route('book.store') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTitle" name="title"
                                       placeholder="Title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="inputDescr" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputDescription" name="description"
                                          placeholder="Description" value="{{ old('description') }}"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="inputPrice" class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPrice" name="price"
                                       placeholder="Price" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('release_date') ? ' has-error' : '' }}">
                            <label for="inputPassword3" class="col-sm-2 control-label">Release Date</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="release_date"
                                           placeholder="dd/mm/yyyy" name="release_date">
                                </div><!-- /.input group -->
                                @if ($errors->has('release_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('release_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                </div><!-- /.box-footer -->
                </form>
            </div><!--/.box-body-->
        </div><!-- /.box -->
    </div><!-- /.col-md-6 -->
    </div><!-- /.row -->
@endsection

@section('footer-script')
        <!-- InputMask -->
    <script src="/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- page script -->
    <script>
        $(document).ready(function () {
            $('#release_date').daterangepicker({
                singleDatePicker: true,
                locale: {format: 'DD/MM/YYYY'}
            });
        });
    </script>
@endsection