@extends('layouts.master')
@section('css')
    <link href="{{asset('css/messages.css')}}" rel="stylesheet"/>
@endsection
@section('js')
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/messageCreate.js') }}" type="text/javascript"></script>
@endsection
@section('body')

    <div class="container">
        <h2>Create Message</h2>
        @if($errors->any())
            @foreach($errors ->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        @endif
        <form method="post" action="/messages">

            {{csrf_field()}}
            <div class="card">
                <input type="hidden" name="created_user_id" id="current_userID" value="{{ app('VoyagerAuth')->user()->id }}">
                <input type="hidden" name="recipient_id" id="recipient_id" value="{{old('recipient_id')}}"/>
                <h5 class="card-header">
                    <label for="receiver_search">To:</label>
                    <input type="text" id="receiver_search" class="form-control">
                    <button id="btnSearchUser" class="btn btn-primary col-xs-2">Search Users</button>
                </h5>
                <select  id="ddlUsers" size="5"></select>

                <div class="card-body card-body-no-padding">
                    <textarea name="content" class="form-control" id="" cols="30" rows="10">{{old('content')}}</textarea>
                </div>
                <div class="card-footer text-muted">
                    <input type="submit" class="btn btn-primary" value="Send Message">
                </div>
            </div>

        </form>
@endsection
