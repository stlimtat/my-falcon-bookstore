@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Books</div>
                    <div class="panel-body">
                        <ul class="chat">
                            @foreach ($books as $book)
                                <li class="left clearfix">
                               <span class="chat-img pull-left">
                                    <img src="" alt="User Avatar" class="img-circle"/>
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">
                                                <a href="/book/{{ $book->id }}">{{$book->title}}</a>
                                            </strong>
                                        <span class="pull-right text-muted small">
                                            {{ $book->authors[0]->name }}
                                        </span>
                                        </div>
                                        <p>{{ $book->description }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
