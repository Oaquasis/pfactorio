@extends('pages.index')

@section('header')
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Collapsed Navigation</h1>
        </div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Layouts</a></li>
            <li class="active">Collapsed Navigation</li>
        </ol>
    </div>
@endsection

@section('content')
    <div id="page-content">
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    <passport-clients></passport-clients>
                    <passport-authorized-clients></passport-authorized-clients>
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            </div>
        </div>
    </div>
@endsection