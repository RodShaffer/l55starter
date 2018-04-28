@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description"
          content="{{ config('site.title') }} index of the latest Myrtle Beach area blog articles on topics such as local business, local events, golf, hotels, nightlife, restaurants, and more."/>
@stop

@section('title')
    <title>{{ config('site.title') }} | Latest Blog Articles</title>
@stop

@section('header')
    @include('partials._header')
@stop

@section('navbar')
    @include('partials._navbar')
@stop

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-12 col-md-8 col-lg-9">

                <div class="card">

                    <div class="card-body">

                        <h4 class="cgbg-heading">Latest Blog Articles</h4>

                        <div class="mt-4"></div>

                        @if($articles->isEmpty())

                            <div class="col-12">
                                <p>Whoops! We couldn't find any blog articles to display.</p>
                            </div>

                        @else

                            @foreach ($articles as $article)
                                <div class="col-12 animated fadeInLeftBig event-card-animation">

                                    <h4><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                    </h4>

                                    <div class="col-12">
                                        {!! $article->excerpt !!}...
                                        <a href="{{ route('articles.show', $article->id) }}">Read More</a>
                                    </div>

                                </div>

                                <div class="mt-4"></div>

                                <hr>

                            @endforeach

                        @endif

                    </div>

                    <div class="row justify-content-center">
                        <p>{{ $articles->links() }}</p>
                    </div>

                </div>

            </div>

            <div class="col-12 col-md-4 col-lg-3">

                <div class="card">

                    <div class="card-body">

                        <h6 class="cgbg-heading">Archives</h6>

                        @if(isset($archive_dates) && count($archive_dates) > 0)

                            @foreach($archive_dates as $archive_date)

                                <div class="col-12">
                                    <a class="cgbg-text-md"
                                       href="/articles/archived?date_begin={{ $archive_date->format('Y-m-d') }}">{{ $archive_date->format('M Y') }}</a>
                                </div>

                            @endforeach

                        @else

                            <div class="col-12">
                                <span class="cgbg-text-md">No Articles Found</span>
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop

@section('page_footer')
    @include('partials._footer')
@stop