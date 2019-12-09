@extends('layouts.profile')
@section('css')
    <link href="{{asset('css/messages.css')}}"  rel="stylesheet" />
@endsection
@section('content')
    <div class="container">


            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card-columns">

                    <div class="card">
                        <h5 class="card-header">From: Featured</h5>
                        <div class="card-body">
                            <h3 class="card-title">Special title treatment</h3>
                            <p class="card-text">With supporting text below as a natural lead-in to additional
                                content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                <div class="card">
                    <h3 class="card-header">From: Featured</h3>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With supporting text below
                            With supporting text below
                            With supporting text below
                            as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">From: Featured</h5>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">From: Featured</h5>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">From: Featured</h5>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With suWith supporting text below
                            With supporting text belowpporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">From: Featured</h5>
                    <div class="card-body">
                        <h3 class="card-title">Special title treatment</h3>
                        <p class="card-text">With supporting text below as a natural lead-in to additional
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>

        </div>
    </div>
@endsection
