@extends('layouts.master')
@section('css')
    <link href="{{asset('css/messages.css')}}" rel="stylesheet"/>
@endsection
@section('body')

    <div class="container">
        <h2>Reply Message</h2>
        @if($errors->any())
            @foreach($errors ->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        @endif
        <form method="post" action="/messages">

            {{csrf_field()}}
            <div class="card">
                <input type="hidden" name="created_user_id" value="{{ $m->created_user_id }}">
                <h5 class="card-header">To:
                    <input type="hidden" name="recipient_id" value="{{$m->recipient_id}}"/>
                    {{$m->Author->name}}
                </h5>

                <div class="card-body card-body-no-padding">
                    <textarea name="content" cols="30" rows="10">{!! $m->content !!}</textarea>
                </div>
                <div class="card-footer text-muted">
                    <input type="submit" class="btn btn-primary" value="Send Message">
                </div>
            </div>

        </form>
@endsection
