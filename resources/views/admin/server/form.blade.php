@extends('pages.index')

@section('header')
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Servers</h1>
        </div>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fal fa-home"></i></a></li>
            <li><a href="#">Admin</a></li>
            <li><a href="{{ route('server.index') }}">Servers</a></li>
            @if(isset($server))
                <li class="active">Edit Server</li>
            @else
                <li class="active">New Server</li>
            @endif
        </ol>
    </div>
    @endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    @if(isset($server))
                        <h3 class="panel-title">Edit server</h3>
                    @else
                        <h3 class="panel-title">Add a new server</h3>
                    @endif
                </div>
                <div id="app">
                    <servers></servers>
                </div>
            </div>
        </div>
    </div>

    <template id="servers-template">
        @if(isset($server))
            {!! Form::model($server, ['route' => ['server.update', $server], 'method' => 'patch', 'class' => 'form-horizontal form-padding']) !!}
        @else
            {!! Form::open(['route' => 'server.store', 'class' => 'form-horizontal form-padding']) !!}
        @endif
        <div class="panel-body">
            <div :class="{'form-group': true, 'has-error': errors.has('name') }">
                {!! Form::label('name', 'Displayname', ['class' => 'control-label col-md-3']) !!}
                <div class="col-md-8">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'v-validate' => "'required'", 'placeholder' => 'Displayname for the server']) !!}
                    <small v-show="errors.has('name')" class="help-block">@{{ errors.first('name') }}</small>
                </div>
            </div>
            <div :class="{'form-group': true, 'has-error': errors.has('dns_name') }">
                {!! Form::label('dns_name', 'DNS Name', ['class' => 'control-label col-md-3']) !!}
                <div class="col-md-8">
                    {!! Form::text('dns_name', old('dns_name'), ['class' => 'form-control', 'v-validate' => "'required'", 'placeholder' => 'DNS name for the server']) !!}
                    <small v-show="errors.has('dns_name')" class="help-block">@{{ errors.first('dns_name') }}</small>
                </div>
            </div>
            <div :class="{'form-group': true, 'has-error': errors.has('ip_address') }">
                {!! Form::label('ip_address', 'IP Address', ['class' => 'control-label col-md-3']) !!}
                <div class="col-md-8">
                    {!! Form::text('ip_address', old('ip_address'), ['class' => 'form-control', 'v-validate' => "'required|ip'", 'placeholder' => 'IP address of the server']) !!}
                    <small v-show="errors.has('ip_address')" class="help-block">@{{ errors.first('ip_address') }}</small>
                </div>
            </div>

        </div>
        <div class="panel-footer text-right">
            {!! Form::submit('Submit', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </template>
    @endsection

@section('footer')
    <script>
        //window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};

        Vue.component('servers', {
            template: "#servers-template"
        });

        new Vue({
            el: '#app'
        });
    </script>
    @endsection
