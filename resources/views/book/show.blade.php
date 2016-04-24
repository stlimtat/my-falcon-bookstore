@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $book->title }}</div>
                    <div class="panel-body">
                        <ul class="chat">
                            @foreach ($book->authors as $author)
                                <li class="left clearfix">
                               <span class="chat-img pull-left">
                                    <img src="" alt="User Avatar" class="img-circle"/>
                                </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">
                                                {{$author->name}}
                                            </strong>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li class="right clearfix">
                                <div class="chat-body clearfix">
                                    <string class="primary-font">
                                        {{ $book->release_date }}
                                    </string>
                                </div>
                            </li>
                            <li class="left clearfix">
                                <div class="chat-body clearfix">
                                    {{ $book->description }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
