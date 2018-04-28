@extends('layouts.app')

@section('meta')
    <meta name="description" content="{{ config('site.title') }} Myrtle Beach area event submission success.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Event Submission Successful</title>
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

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        @include('flash::message')

                        <h4 class="cgbg-heading">Event Submission Successful</h4>

                        <div class="mt-3"></div>

                        @if(isset($event))

                            <div class="col-12">
                                <p>All Events must be approved by a Hey Myrtle staff member. We will review the event
                                    submission and approve or deny the event usually within 24 business hours.</p>

                                <p>Here are the details of the event submission for your review.</p>
                            </div>

                            <div class="col-12">

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Type:</span>

                                </div>

                                <div class="col-12">

                                    @foreach ($event->eventTypes as $eventType)

                                        <div class="col-12">
                                            <span>{{ $eventType->name }} Event</span>
                                        </div>

                                    @endforeach

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Summary:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->summary }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Description:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{!! $event->description !!}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Location:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->location }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event URL:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->source_url }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Image:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <div class="mt-2"></div>
                                            <img src="{{ $event->image }}" alt="{{ $event->summary }}
                                                    image">
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Organizer:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->organizer_name }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Organizer Email:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->organizer_email }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Organizer Phone:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        @if(isset($event->organizer_phone_ext))
                                            <span>{{ $event->organizer_phone }} Ext. {{ $event->organizer_phone_ext }}</span>
                                        @else
                                            <span>{{ $event->organizer_phone }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Start Date:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->start_date }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">Event Start Time:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">
                                        <span>{{ $event->start_time }}</span>
                                    </div>

                                </div>

                                <div class="mt-3"></div>

                                <div class="col-12">

                                    <span class="cgbg-heading">All Day Event:</span>

                                </div>

                                <div class="col-12">

                                    <div class="col-12">

                                        @if($event->all_day)

                                            <span>Yes</span>

                                        @else

                                            <span>No</span>

                                        @endif

                                    </div>

                                </div>

                                @if(!$event->all_day)

                                    <div class="col-12">

                                        <span class="cgbg-heading">Event End Date:</span>

                                    </div>

                                    <div class="col-12">

                                        <div class="col-12">
                                            <span>{{ $event->end_date }}</span>
                                        </div>

                                    </div>

                                    <div class="mt-3"></div>

                                    <div class="col-12">

                                        <span class="cgbg-heading">Event End Time:</span>

                                    </div>

                                    <div class="col-12">

                                        <div class="col-12">
                                            <span>{{ $event->end_time }}</span>
                                        </div>

                                    </div>

                                @endif

                            </div>

                        @else

                            <div class="col-12">

                                <p>Whoops! An unexpected error has occurred and the details of the event submission
                                    could not be displayed.</p>

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