@extends('layouts.app')

@section('meta')
    @if(isset($article))
        <meta name="author" content="{{ $article->user->name }}">
        <meta name="description" content="{{ $article->getArticleDescription() }}"/>
    @endif
@stop

@section('title')
    @if(isset($article))
        @if(config('article.site_name_in_title'))
            <title>{{ config('site.title') }} | {{ $article->sef_title }}</title>
        @else
            <title>{{ $article->sef_title }}</title>
        @endif
    @else
        <title>{{ config('site.title') }} | View Blog Article</title>
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

        <div class="row mt-3">

            <div class="col-12">

                @if(isset($article))

                    <div class="card">

                        <div class="card-header cgbg-heading-nb"><h5>{{ $article->title }}</h5></div>

                        <div class="card-body animated fadeIn article-card-animation">

                            <div class="col-12">

                                <div class="row">

                                    <div class="col-12 animated lightSpeedIn article-type-btn-animation">

                                        <p class="cgbg-tag-heading">Associated Tags:</p>

                                        @foreach ($article->tags as $tag)

                                            <a class="btn btn-outline-primary btn-sm cgbg-tag-btn"
                                               href="/articles/search/{{ $tag->name }}"
                                               role="button">{{ $tag->name }}</a>

                                        @endforeach

                                    </div>

                                </div>

                                <div class="cgbg-article-container">

                                    <div class="cgbg-article">

                                        <p>{!! $article->body !!}</p>

                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="row">

                                    <div class="col-12">

                                        <a href="https://www.gravatar.com/{{ $article->user->gravatar }}"
                                           target="_blank">
                                            <img src="https://www.gravatar.com/avatar/{{ $article->user->gravatar }}"
                                                 class="cgbg-header-info-gravatar">
                                        </a>

                                        <div class="w-100"></div>

                                        <span class="cgbg-article-author-text">Article Author:</span>

                                        <span class="cgbg-article-author">
                                        {{ $article->user->name }}
                                    </span>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-12">

                                        <span class="cgbg-article-pub-text">Article published on:</span>

                                        <br>

                                        <span class="cgbg-article-pub-date">
                                        {{ $article->published_at->format('M jS Y \a\t g:i A T') }}
                                    </span>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-12 cb-container">

                            <div class="comment-box" id="comment-box">

                                <comment-box :article_id="{{ $article->id }}"></comment-box>

                            </div>

                        </div>

                    </div>

                @else

                    <div class="card">

                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">

                                    <p>Whoops! We couldn't find any blog article to display.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

@stop

@section('page_footer')
    @include('partials._footer')
@stop


@section('script_footer')

    @include('articles.scripts._show-article')

@stop
