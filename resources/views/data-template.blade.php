@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="Myrtle Beach, SC area event.">
@endsection

@section('title')
    <title>{{ config('site.title') }} | Myrtle Beach, SC area event</title>
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

                            <div class="col-12">
                                <p>
                                    Event Information
                                </p>
                            </div>

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