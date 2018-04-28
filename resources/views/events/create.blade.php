@extends('layouts.app')

@section('meta')
    <meta name="description" content="{{ config('site.title') }} submit a local Myrtle Beach, SC area event.">
@stop

@section('title')
    <title>{{ config('site.title') }} | Submit Myrtle Beach Area Event</title>
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

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        @include('flash::message')

                        <h4 class="cgbg-heading">Submit Myrtle Beach Area Event</h4>

                        <div class="mt-3"></div>

                        @if(isset($event_type_list) && count($event_type_list) > 0)

                            <div id="event-form">

                                <event-form :types="{{ $event_type_list }}"></event-form>

                            </div>

                        @else

                            <div class="col-12">
                                <p>
                                    Whoops! An error occurred and the form for submitting an event could not be
                                    displayed.
                                </p>
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

@section('script_footer')
    @include('events.scripts._create')
@stop