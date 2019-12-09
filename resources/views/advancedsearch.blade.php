<?php
function Category_Name($id)
{
    switch ($id) {
        case 1:
            return "Car";
        case 2:
            return "Real Estate";
        case 3:
            return "Jobs";
        case 4:
            return "Pets";

        case 5:
            return "Services";
        case 6:
            return "Vacation Rentals";
        default:
            return "N/A";
    }
}

function selectOption($value, $option)
{
    return $value == $option ? 'selected' : '';
}

?>
@extends('layouts.master')
@section('css')
    <link href="{{asset('css/advancedsearch.css')}}" rel="stylesheet"/>
@endsection
@section('body')
    <div class="container">
        {{--        <form id="search-form" action="" method="POST" enctype="multipart/form-data">--}}

        {{--            <div class="row" id="search">--}}
        {{--                <div class="form-group col-sm-9 col-xs-9">--}}
        {{--                    <input class="form-control" type="text" placeholder="Search" name="term" value="{{$search->term}}"/>--}}
        {{--                </div>--}}
        {{--                <div class="form-group col-sm-3 col-xs-6">--}}
        {{--                    <button type="submit" class="btn btn-block btn-primary">Search</button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </form>--}}

        <form method="post" action="/advancedsearch">
            {{csrf_field()}}
            <div class="row" id="search">
                <div class="form-group col-sm-9 col-xs-9">
                    <input class="form-control" type="text" placeholder="Search" name="term" value="{{$search->term}}"/>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <button type="submit" class="btn btn-block btn-primary">Search</button>
                </div>
            </div>
            <div class="row" id="filter">
                <div class="form-group col-sm-3 col-xs-6">
                    <select name="category" data-filter="make" class="filter-make filter form-control">
                        <option value="0">Select Category</option>
                        <option value="1" {{ selectOption($search->category,1)}}>Cars</option>
                        <option value="2" {{ selectOption($search->category,2)}}>Real Estate</option>
                        <option value="3" {{ selectOption($search->category,3)}}>Jobs</option>
                        <option value="4" {{ selectOption($search->category,4)}}>Pets</option>
                        <option value="5" {{ selectOption($search->category,5)}}>Services</option>
                        <option value="6" {{ selectOption($search->category,6)}}>Vacation Rentals</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select name="status" data-filter="model" class="filter-model filter form-control">
                        <option value="">Select Status</option>
                        <option value="PUBLISHED"  {{ selectOption($search->status,'PUBLISHED')}}>Active</option>
                        <option value="CLOSED"  {{ selectOption($search->status,'CLOSED')}}>Expired</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <select name="time" data-filter="type" class="filter-type filter form-control">
                        <option value="0">Select Time</option>
                        <option value="1" {{ selectOption($search->time,1)}}>Last Week</option>
                        <option value="2" {{ selectOption($search->time,2)}}>Last Month</option>
                        <option value="3" {{ selectOption($search->time,3)}}>Last 3 Months</option>
                    </select>
                </div>
{{--                <div class="form-group col-sm-3 col-xs-6">--}}
{{--                    <select data-filter="price" class="filter-price filter form-control">--}}
{{--                        <option value="">Select Area</option>--}}
{{--                        <option value="">Show All</option>--}}
{{--                        <option value="">City of Toronto</option>--}}
{{--                        <option value="">Mississauga</option>--}}
{{--                        <option value="">Brampton</option>--}}
{{--                        <option value="">Vaugan</option>--}}
{{--                        <option value="">Markham</option>--}}
{{--                        <option value="">Scarborough</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
            </div>
        </form>

    </div>

    <div class="container" style="margin-bottom: 1rem;">

        <hgroup class="mb20">
            <h1>Search Results</h1>
            @if (trim($search->term)==false)
                <h2 class="lead"><strong class="text-danger">{{$data->total()}}</strong>
                    active posts</h2>
            @else
                <h2 class="lead"><strong class="text-danger">{{$data->total()}}</strong> results were found for the
                    search for <strong
                        class="text-danger">{{$search->term}}</strong></h2>
            @endif

        </hgroup>

        <section class="col-xs-12 col-sm-6 col-md-12">
            {{--            {{$data->total}}--}}
            <div class=" navbar -bg-dark -navbar-dark navbar-expand-md mb-5">
                <button class="navbar-toggler" type="button"
                        data-toggle="collapse" data-target="#myPaging1"
                        aria-expanded="false" aria-label="Toggle Navigation">
                    [+]
                </button>
                <div class="paging collapse navbar-collapse" id="myPaging1">

                {{ $data->links() }}
                </div>
            </div>
            {{--            <ul class="pagination justify-content-end">--}}
            {{--                <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
            {{--                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
            {{--                <li class="page-item "><a class="page-link" href="#">2</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
            {{--            </ul>--}}
            @foreach($data as $post)
{{--                {{$post->id}}--}}

                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <a href="#" title="Lorem ipsum" class="thumbnail">
                            <img src="{{'/storage/'.$post->image}}" class="img-thumbnail"
                                 alt="{{'storage/'.$post->image}}"/>
                        </a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li>
                        <span class="select-menu-item-icon"><svg class="octicon octicon-calendar" viewBox="0 0 14 16"
                                                                 version="1.1" width="14" height="16"
                                                                 aria-hidden="true"><path fill-rule="evenodd"
                                                                                          d="M13 2h-1v1.5c0 .28-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5V2H6v1.5c0 .28-.22.5-.5.5h-2c-.28 0-.5-.22-.5-.5V2H2c-.55 0-1 .45-1 1v11c0 .55.45 1 1 1h11c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm0 12H2V5h11v9zM5 3H4V1h1v2zm6 0h-1V1h1v2zM6 7H5V6h1v1zm2 0H7V6h1v1zm2 0H9V6h1v1zm2 0h-1V6h1v1zM4 9H3V8h1v1zm2 0H5V8h1v1zm2 0H7V8h1v1zm2 0H9V8h1v1zm2 0h-1V8h1v1zm-8 2H3v-1h1v1zm2 0H5v-1h1v1zm2 0H7v-1h1v1zm2 0H9v-1h1v1zm2 0h-1v-1h1v1zm-8 2H3v-1h1v1zm2 0H5v-1h1v1zm2 0H7v-1h1v1zm2 0H9v-1h1v1z"></path></svg></span>

                                <span>{{ \Carbon\Carbon::parse($post->created_at)->format('d/M/Y')}}</span></li>
                            <li>
                        <span class="select-menu-item-icon"><svg class="octicon octicon-clock" viewBox="0 0 14 16"
                                                                 version="1.1" width="14" height="16"
                                                                 aria-hidden="true"><path fill-rule="evenodd"
                                                                                          d="M8 8h3v2H7c-.55 0-1-.45-1-1V4h2v4zM7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 011.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7z"></path></svg></span>

                                <span>{{ \Carbon\Carbon::parse($post->created_at)->format('h:i:s A')}}</span></li>
                            <li>
                        <span class="select-menu-item-icon"><svg class="octicon octicon-tag" viewBox="0 0 14 16"
                                                                 version="1.1" width="14" height="16"
                                                                 aria-hidden="true"><path fill-rule="evenodd"
                                                                                          d="M7.73 1.73C7.26 1.26 6.62 1 5.96 1H3.5C2.13 1 1 2.13 1 3.5v2.47c0 .66.27 1.3.73 1.77l6.06 6.06c.39.39 1.02.39 1.41 0l4.59-4.59a.996.996 0 000-1.41L7.73 1.73zM2.38 7.09c-.31-.3-.47-.7-.47-1.13V3.5c0-.88.72-1.59 1.59-1.59h2.47c.42 0 .83.16 1.13.47l6.14 6.13-4.73 4.73-6.13-6.15zM3.01 3h2v2H3V3h.01z"></path></svg></span>

                                <span>{{Category_Name($post->category_id)}}</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href="#" title="">{{$post->title}}</a></h3>
                        <p class="card-text">{{$post->body}}</p>
                        <span class="plus"><a href="#" title="Lorem ipsum">+</a></span>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
            @endforeach

            {{ $data->links() }}

            {{--            <ul class="pagination justify-content-end">--}}
            {{--                <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
            {{--                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
            {{--                <li class="page-item "><a class="page-link" href="#">2</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            {{--                <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
            {{--            </ul>--}}
        </section>

    </div>

@endsection
