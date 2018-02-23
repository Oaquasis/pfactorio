<template>
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
</template>

<script>
    export default{
        data() {
            return [];
        },
    }

</script>