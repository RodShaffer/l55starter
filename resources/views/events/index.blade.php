@extends('layouts.app')

@section('meta')
    <meta name="description" content="{{ config('site.title') }} index of all Myrtle Beach area events.">
@endsection

@section('title')
    <title>{{ config('site.title') }} | All Myrtle Beach Area Events</title>
@endsection

@section('header')
    @include('partials._header')
@endsection

@section('navbar')
    @include('partials._navbar')
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row mt-3">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <h4 class="cgbg-heading">All Myrtle Beach Area Events</h4>

                        @if(isset($events) && count($events) > 0)

                            <div class="container-fluid">

                                <div class="row mt-5">

                                    @for($i = 0; $i <count($events); $i++)

                                        <div class="col-md-4 col-lg-4 col-xl-3">

                                            <div class="card event-card">

                                            @if(isset($events[$i]->image_thumb))

                                                <a href="{{ route('event.show', $events[$i]) }}">
                                                    <img class="card-img-top animated fadeIn event-card-animation"
                                                         src="{{ $events[$i]->image_thumb }}"
                                                         alt="{{ $events[$i]->summary }} image" width="150px">
                                                </a>

                                            @else

                                                <a href="{{ route('event.show', $events[$i]) }}">
                                                    <img class="card-img-top animated fadeIn event-card-animation"
                                                         src="/storage/users/events/default_event-image-thumb.jpg"
                                                         alt="{{ $events[$i]->summary }} image" width="150px">
                                                </a>

                                            @endif

                                                <div class="card-body">

                                                    <p class="card-text event-text animated fadeIn event-card-animation">

                                                        <a class="event-summary"
                                                           href="{{ route('event.show', $events[$i]) }}">
                                                            {{ $events[$i]->summary }}
                                                        </a>

                                                        <br>

                                                        <span class="event-start">{{ $events[$i]->start_date_formatted }}</span>
                                                        &nbsp;<span class="event-amp">@&nbsp;</span>
                                                        <span class="event-start">{{ $events[$i]->start_time_formatted }}</span>

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    @endfor

                                </div>

                            </div>

                        @else

                            <div class="col-12">
                                <p>
                                    Whoops! We couldn't find any events.
                                </p>
                            </div>

                        @endif

                    </div>

                    <div class="row justify-content-center">
                        <p>{{ $events->links() }}</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('page_footer')
    @include('partials._footer')
@endsection