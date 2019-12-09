@extends('layouts.profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row card-header">
                    <div class="col-sm-12 col-md-6"><h4>Closed Posts</h4></div>
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

                    <div class="row">
                    @foreach($posts as $post)
                        <div class="col-sm-4">
                            <section class="card mb-5" id="cars">
                                <img class="card-img-top" src="storage/images/cars.png" alt="Car Photos">
                                <div class="card-body">
                                    <h2 class="card-title">2015 Toyota</h2>
                                    <h5 class="card-subtitle">Cars</h5>
                                    <p class="card-text">2015 Toyota 4Runner SR5 Grey 4.0L V6 SMPI DOHC 24V 4WD 4WD V6 SMPI DOHC 24V 4WD
                                        4WD</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="well well-sm">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <h1 class="rating-num">
                                                        4.0</h1>
                                                    <div class="rating">
                                                        <span class="glyphicon glyphicon-star"></span><span
                                                            class="glyphicon glyphicon-star">
                    </span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star">
                    </span><span class="glyphicon glyphicon-star-empty"></span>
                                                    </div>
                                                    <div>
                                                        <span class="glyphicon glyphicon-user"></span>1,050,008 total
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 rating_progress">
                                                    <div class="row rating-desc">
                                                        <div class="col-xs-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>5
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <div class="progress progress-striped">
                                                                <div class="progress-bar progress-bar-success" role="progressbar"
                                                                     aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                    <span class="sr-only">80%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 5 -->
                                                        <div class="col-xs-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>4
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success" role="progressbar"
                                                                     aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                    <span class="sr-only">60%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 4 -->
                                                        <div class="col-xs-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>3
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                                     aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                    <span class="sr-only">40%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 3 -->
                                                        <div class="col-xs-3  text-right">
                                                            <span class="glyphicon glyphicon-star"></span>2
                                                        </div>
                                                        <div class="col-xs-8 ">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-warning" role="progressbar"
                                                                     aria-valuenow="20"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                                    <span class="sr-only">20%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 2 -->
                                                        <div class="col-xs-3 text-right">
                                                            <span class="glyphicon glyphicon-star"></span>1
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                                                     aria-valuenow="80"
                                                                     aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                                                    <span class="sr-only">15%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end 1 -->
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section><!-- card -->
                        </div>
                    @endforeach
                    </div>
                    <div class="row">
                        <div class="pull-left">
                            <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $posts->total(), [
                                        'from' => $posts->firstItem(),
                                        'to' => $posts->lastItem(),
                                        'all' => $posts->total()
                                    ]) }}</div>
                        </div>
                        <div class="pull-right">
                            {{ $posts->onEachSide(2)->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
