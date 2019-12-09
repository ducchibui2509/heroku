@extends('layouts.master')
@section('css')
    <link href="{{asset('css/messages.css')}}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/messageIndex.js') }}" type="text/javascript"></script>
@endsection
@section('body')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <a href="/messages/create" class="btn btn-primary btn-create">Create Message</a>
            <div class="card-columns">
                @csrf
            @foreach($messages as $m)
                    <div class="card">
                        <div class="card-header {{$m->status}}">
                           <span class="who"> From: {{$m->Author->name}}</span>
                            <span class="date"> {{$m->created_at}}</span>
                        </div>
                        <div class="card-body">
                            <p class="card-text -text-wrap">{!! nl2br(e($m->content)) !!}</p>
                        </div>
                        <div class="card-footer">
{{--                            <form action="{{ route('messages.read', $m->id)}}" method="post" class=" footer-section">--}}
{{--                                @csrf--}}
{{--                                <input type="submit" class="btn btn-primary {{$m->status=='unread'?'':'disabled'}}" {{$m->status=='unread'?'':'disabled'}} value="Read">--}}
{{--                            </form>--}}
                            <button class="btnRead btn btn-primary col-xs-2 {{$m->status=='unread'?'':'disabled'}}" {{$m->status=='unread'?'':'disabled'}} msgid="{{$m->id}}">Read</button>

                            <div class=" footer-section">
                                <a href="/messagesreply/{{$m->id}}" class=" btn btn-primary">Reply</a>
                            </div>

{{--                            <form action="{{ route('messages.destroy', $m->id)}}" method="post" class="footer-section">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <input type="submit" class=" btn btn-warning" value="Delete">--}}
{{--                            </form>--}}
                            <button class="btnDelete btn btn-warning"  msgid="{{$m->id}}">Delete</button>

                        </div>
                    </div>
                @endforeach

            </div>
{{--        <div class="card-columns">--}}
{{--            @foreach($messages as $m)--}}
{{--                <div class="card">--}}
{{--                    <div class="card-row row card-header {{$m->status}}">--}}
{{--                        <h5 class="col-xs-6">From: {{$m->Author->name}}</h5>--}}
{{--                        <h5 class="col-xs-6"> {{$m->created_at}}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-row card-body">--}}
{{--                        <p class="card-text text-wrap">{{nl2br($m->content)}}</p>--}}

{{--                    </div>--}}
{{--                    <div class="card-row row card-footer">--}}
{{--                        <form action="{{ route('messages.read', $m->id)}}" method="post" class=" footer-section">--}}
{{--                            @csrf--}}
{{--                            <input type="submit" class="btn btn-primary {{$m->status=='unread'?'':'disabled'}}" {{$m->status=='unread'?'':'disabled'}} value="Read">--}}
{{--                        </form>--}}
{{--                        <div class=" footer-section">--}}
{{--                            <a href="/messagesreply/{{$m->id}}" class=" btn btn-primary">Reply</a>--}}

{{--                        </div>--}}

{{--                        <form action="{{ route('messages.destroy', $m->id)}}" method="post" class="footer-section">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <input type="submit" class=" btn btn-warning" value="Delete">--}}
{{--                        </form>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--        </div>--}}
    </div>
@endsection
