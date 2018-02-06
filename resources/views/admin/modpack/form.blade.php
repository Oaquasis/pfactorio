@extends('pages.index')

@section('header')
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Packs</h1>
        </div>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fal fa-home"></i></a></li>
            <li><a href="#">Admin</a></li>
            <li><a href="{{ route('modpack.index') }}">Modpacks</a></li>
            @if(isset($server))
                <li class="active">Edit Modpack</li>
            @else
                <li class="active">New Modpack</li>
            @endif
        </ol>
    </div>
@endsection

@section('content')
    <div id="modpackForm" class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    @if(isset($modpack))
                        <h3 class="panel-title">Edit Modpack</h3>
                    @else
                        <h3 class="panel-title">Add a new Modpack</h3>
                    @endif
                </div>

                <modpack inline-template>
                    @if(isset($modpack))
                        {!! Form::model($modpack, ['route' => ['modpack.update', $modpack], 'method' => 'patch', 'class' => 'form-horizontal form-padding']) !!}
                    @else
                        {!! Form::open(['route' => 'modpack.store', 'class' => 'form-horizontal form-padding']) !!}
                    @endif
                    <div class="panel-body">
                        <div :class="{'form-group': true, 'has-error': errors.has('name') }">
                            {!! Form::label('name', 'Displayname', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-8">
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'v-validate' => "'required'", 'placeholder' => 'Displayname for the modpack']) !!}
                                <small v-show="errors.has('name')" class="help-block">@{{ errors.first('name') }}</small>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('version', 'Version', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-8">
                                {!! Form::text('version', old('version') > 0 ? old('version') : 1, ['class' => 'form-control', 'disabled']) !!}
                                {!! Form::hidden('version', old('version') > 0 ? old('version') : 1) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Server</label>
                            <div class="col-md-8">
                                <select id="server" name="server" class="form-control" placeholder="Choose a server...">
                                    <option value="" default>None</option>
                                    @foreach($servers as $server)
                                        <option value="{{ $server->id }}">{{ $server->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        {!! Form::submit('Submit', ['class' => 'btn btn-success']); !!}
                    </div>
                    {!! Form::close() !!}
                </modpack>
            </div>
        </div>
    </div>
@endsection

