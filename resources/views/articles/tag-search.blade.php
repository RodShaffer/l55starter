@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    @if(isset($local_tag->name))
        <meta name="description"
              content="{{ config('site.title') }} index of all blog articles tagged with '{{ $local_tag->name }}'"/>
    @endif
@stop

@section('title')
    @if(isset($local_tag->name))
        <title>{{ config('site.title') }} | All Articles Tagged With "{{ $local_tag->name }}"</title>
    @else
        <title>{{ config('site.title') }} | All Articles With Tag</title>
    @endif

@stop

@section('header')
    @include('partials._header')
@stop

@section('navbar')
    @include('partials._navbar')
@stop

@section('content')

    <div class="container-fluid">

        <div class="mt-3"></div>

        <div class="row">

            <div class="col-12 col-md-8 col-lg-9">

                <div class="card">

                    <div class="card-body">

                        @if(isset($local_tag->name))
                            <h4 class="cgbg-heading">All Articles Tagged With "{{ $local_tag->name }}"</h4>
                        @else
                            <h4 class="cgbg-heading">All Articles With Tag</h4>
                        @endif

                        <div class="mt-3"></div>

                        @if($articles->isEmpty())

                            <div class="col-12">
                                <p>Whoops! We couldn't find any blog articles to display.</p>
                            </div>

                        @else

                            @foreach ($articles as $article)
                                    <div class="col-12 animated fadeInLeftBig event-card-animation">

                                    <h4><a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a></h4>

                                    <div class="col-12">
                                        {!! $article->excerpt !!}...
                                        <a href="{{ url('/articles', $article->id) }}">Read More</a>
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