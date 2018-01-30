@extends('layouts.master')

@section('head')
@stop

@section('header')
    @yield('header')
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