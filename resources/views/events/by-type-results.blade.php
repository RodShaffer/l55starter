@extends('layouts.app')

@section('meta')
    @if(isset($eventType))
        <meta name="description"
              content="{{ config('site.title') }} index of all upcoming Myrtle Beach area {{ $eventType->name }} events.">
    @else
        <meta name="description"
              content="{{ config('site.title') }} index of all upcoming Myrtle Beach area events for a specific type of event.">
    @endif
@endsection

@section('title')
    @if(isset($eventType))
        <title>{{ config('site.title') }} | All Upcoming Myrtle Beach Area {{ $eventType->name }} Events</title>
    @else
        <title>{{ config('site.title') }} | All Upcoming Events For A Specific Type</title>
    @endif
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

                        @if(isset($eventType))
                            <h4 class="cgbg-heading">All Upcoming Myrtle Beach Area {{ $eventType->name }} Events</h4>
                        @else
                            <h4 class="cgbg-heading">All Upcoming Events For A Specific Type</h4>
                        @endif

                        @if(isset($events) && count($events) > 0)

                            <div class="container-fluid">

                                <div class="row mt-4">

                                    @for($i = 0; $i <count($events); $i++)

                                        <div class="col-md-4 col-lg-4 col-xl-3">

                                            <div class="card event-card">

                                                @if(isset($events[$i]->image_thumb))

                                                    <a href="{{ route('event.show', $events[$i]) }}">
                                                        <img class="card-img-top animated fadeIn event-card-animation"
                                                             src="{{ $events[$i]->image_thumb }}"
                                                             alt="{{ $events[$i]->summary }} image" width="200px">
                                                    </a>

                                                @else

                                                    <a href="{{ route('event.show', $events[$i]) }}">
                                                        <img class="card-img-top animated fadeIn event-card-animation"
                                                             src="/storage/users/events/default_event-image-thumb.jpg"
                                                             alt="{{ $events[$i]->summary }} image" width="200px">
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