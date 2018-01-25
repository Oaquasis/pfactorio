@extends('layouts.master')

@section('head')
@stop

@section('header')
    <div id="page-head">
        <div class="pad-all text-center">
            <h3>Welcome back to the Dashboard.</h3>
            <p>Scroll down to see quick links and overviews of your Server, To do list, Order status or get some Help using Nifty.</p>
        </div>
    </div>
@endsection

@section('navigation.top')
    @include('navigation.top')
@endsection

@section('navigation.main')
    @include('navigation.main')
@stop

@section('content')
    @include('partials.info')
    <hr class="new-section-sm">
    @include('partials.timeline')
@stop

@section('footer')

@stop