@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-12 col-md-6"><h4>Public posts</h4></div>
                    <div class="col-sm-12 col-md-6">
                        <form class="form-inline md-form form-sm active-cyan active-cyan-2 mt-2">
                            <i class="voyager-search" aria-hidden="true"></i>
                            <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search"
                                   aria-label="Search">
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @include('user.post-list-sample')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
