@extends('layouts.app')

@section('page-title')
    Falcon BookStore | Details
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-text-width"></i>
                    <h3 class="box-title">{{$book->id}} - {{ $book->title }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>Description</dt>
                        <dd>{{ $book->description }}</dd>
                        <dt>Price</dt>
                        <dd>{{ $book->price }}</dd>
                        <dt>Author(s)</dt>
                        <dd>
                            @foreach ($book->authors as $i => $author)
                                @if ($i > 0)
                                    |
                                @endif
                                {{ $author->name }}
                            @endforeach
                        </dd>
                        <dt>Genre(s)</dt>
                        <dd>
                            @foreach ($book->genres as $i => $genre)
                                @if ($i > 0)
                                    |
                                @endif
                                {{ $genre->name }}
                            @endforeach
                        </dd>
                        <dt>Release Date</dt>
                        <dd>{{ $book->release_date }}</dd>
                        <dt>Created By</dt>
                        <dd>{{ App\User::find($book->created_by)->name }}</dd>
                        <dt>Created At</dt>
                        <dd>{{ $book->created_at }}</dd>
                        <dt>Updated By</dt>
                        <dd>{{ App\User::find($book->created_by)->name }}</dd>
                        <dt>Updated At</dt>
                        <dd>{{ $book->updated_at }}</dd>
                    </dl>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- ./col -->
    </div>
@endsection
