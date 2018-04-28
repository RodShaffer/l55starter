@extends('layouts.app')

@section('meta')
    <meta name="author" content="{{ config('site.owner') }}">
    <meta name="description" content="Search Myrtle Beach, SC area events by type.">
@endsection

@section('title')
    <title>{{ config('site.title') }} | Myrtle Beach, SC area events by type</title>
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

                        <h4 class="cgbg-heading">Search Events by Type</h4>

                        <div class="mt-4"></div>

                        @if(isset($eventTypes))


                            <div class="container-fluid">

                                <div class="row">


                                    @for($i = 0; $i <count($eventTypes); $i++)

                                        @if($i % 4 == 0)

                                            <div class="w-100"></div>

                                        @endif



                                        <div class="col-md-6 col-lg-3">

                                            <p class="animated fadeIn event-type-btn-animation">
                                                <a href="{{ route('event.search.byType', $eventTypes[$i]['eventType']) }}">
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <i class="fas fa-calendar-alt"></i> {{ $eventTypes[$i]['eventType']->name }}
                                                    </button>
                                                </a>
                                                &nbsp;({{ $eventTypes[$i]['count'] }})
                                            </p>

                                        </div>


                                    @endfor

                                </div>

                            </div>


                        @else

                            <div class="col-12">
                                <p>
                                    Whoops! We couldn't find any event types.
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