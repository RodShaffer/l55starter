@extends('layouts.app')

@section('meta')
    @if(isset($event))
        <meta name="author" content="{{ $event->user->name }}">
        <meta name="description" content="{{ $event->summary }}, Myrtle Beach, SC area event.">
    @else
        <meta name="author" content="{{ config('site.owner') }}">
        <meta name="description" content="Myrtle Beach, SC area event.">
    @endif
@endsection

@section('title')
    @if(isset($event))
        <title>{{ $event->summary }}</title>
    @else
        <title>{{ config('site.title') }} | Myrtle Beach, SC area event</title>
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

            <div class="col-12">

                <div class="card">

                    <div class="card-body">

                        @if(isset($event))
                            <h4 class="cgbg-heading">{{ $event->summary }}</h4>
                        @else
                            <h4 class="cgbg-heading">View Event</h4>
                        @endif

                        <div class="mt-4"></div>

                        @if(isset($event))

                            <div class="col-12">&nbsp;</div>

                            <form class="form-horizontal" role="presentation" method="" action="">

                                <div class="row">

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="event_type_list"
                                                   class="col-lg-4 col-form-label text-lg-right">Event Type</label>
                                            <div class="col-lg-7 event-info">

                                                @foreach($event->eventTypes as $event_type)

                                                    <a href="{{ route('event.search.byType', $event_type) }}">
                                                        <button type="button" class="btn btn-outline-primary">
                                                            <i class="fas fa-calendar-alt"></i> {{ $event_type->name }}
                                                        </button>
                                                    </a>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="description"
                                                   class="col-lg-4 col-form-label text-lg-right">Event
                                                Description</label>
                                            <div class="col-lg-7">

                                                <pre class="event-info">{!! $event->description !!}</pre>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="location"
                                                   class="col-lg-4 col-form-label text-lg-right">Event Location</label>
                                            <div class="col-lg-7">

                                                <iframe class="event-info event-map" frameborder="0" style="border:0"
                                                        src="https://www.google.com/maps/embed/v1/place?key={{ config('google.maps_embed_api_key') }}&q={{ $event->location }}"
                                                        allowfullscreen>
                                                </iframe>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    @if(isset($event->source_url) && !empty($event->source_url))

                                        <div class="form-group col-lg-12">
                                            <div class="row">
                                                <label for="source_url"
                                                       class="col-lg-4 col-form-label text-lg-right">Event URL</label>
                                                <div class="col-lg-7">

                                                    <p class="event-info">
                                                        <a href="{{ $event->source_url }}"
                                                           target="_blank">{{ $event->source_url }}
                                                        </a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>

                                    @endif

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="organizer_name"
                                                   class="col-lg-4 col-form-label text-lg-right">Event Organizer</label>
                                            <div class="col-lg-7">

                                                <p class="event-info">
                                                    {{ $event->organizer_name }}
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">

                                            <label for="start_date_time"
                                                   class="col-lg-4 col-form-label text-lg-right">Event Start</label>

                                            <div class="input-group col-lg-7">

                                                <p class="event-info">
                                                    <span class="event-start-light">{{ $event->start_date_formatted }}</span>
                                                    &nbsp;<span class="event-amp-light">@&nbsp;</span>
                                                    <span class="event-start-light">{{ $event->start_time_formatted }}</span>
                                                </p>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">

                                        <div class="row">

                                            <label for="all_day" class="col-lg-4 col-form-label text-lg-right">All
                                                Day Event?</label>

                                            <div class="col-lg-7">

                                                @if($event->all_day)

                                                    <p class="cgbg-event-info">
                                                        Yes
                                                    </p>

                                                @else

                                                    <p class="cgbg-event-info">
                                                        No
                                                    </p>

                                                @endif

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">

                                            <label for="end_date_time"
                                                   class="col-lg-4 col-form-label text-lg-right">Event End</label>

                                            <div class="input-group col-lg-7">

                                                <p class="event-info">
                                                    <span class="event-end">{{ $event->end_date_formatted }}</span>
                                                    &nbsp;<span class="event-amp">@&nbsp;</span>
                                                    <span class="event-end">{{ $event->end_time_formatted }}</span>
                                                </p>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="image"
                                                   class="col-lg-4 col-form-label text-lg-right">Event Image</label>

                                            <div class="col-lg-7">

                                                <p class="event-info">

                                                    <img class="img-fluid" src="{{ $event->image }}"
                                                         alt="{{ $event->summary }} image">

                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">&nbsp;</div>

                                    <div class="form-group form-group-sm col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4"></div>
                                            <div class="col-lg-7">
                                                <a href="{{ url()->previous() }}">
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <i class="fas fa-arrow-left"></i> Back
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>

                        @else

                            <div class="col-12">
                                <p>
                                    Whoops! We couldn't find the selected event information.
                                </p>
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('page_footer')
    @include('partials._footer')
@endsection

@section('script_footer')
    @include('events.scripts._show')
@stop