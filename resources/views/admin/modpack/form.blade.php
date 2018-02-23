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
                <form accept-charset="UTF-8" class="form-horizontal form-padding" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                @if(isset($modpack))
                    {{ method_field("PATCH") }}
                @endif
                <div class="panel-body">
                    <div :class="{'form-group': true, 'has-error': form.errors.has('name') }">
                        <label for="name" class="control-label col-md-3">Display name</label>
                        <div class="col-md-8">
                            <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Display name for the Modpack">
                            <small v-show="form.errors.has('name')" class="help-block">@{{ form.errors.get('name') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="version" class="control-label col-md-3">Version</label>
                        <div class="col-md-8">
                            <input type="text" name="version" value="{{ old('version') > 0 ? old('version') : 1 }}" class="form-control" disabled="disabled">
                            <input type="hidden" value="{{ old('version') > 0 ? old('version') : 1 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Server</label>
                        <div class="col-md-8">
                            @if(isset($modpack->server))
                                $modpack->server
                            @else
                                Geen server gekoppeld.
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-succes" :disabled="form.errors.any()">Submit</button>
                </div>
                {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        var modPack = new Vue({
            el: '#modpackForm',

            data: {
                form: new Form({
                    name: ''
                })
            },

            methods: {
                onSubmit() {
                    @if(isset($modpack))
                        this.form.post('{{ route('modpack.update', ['id' => $modpack->id]) }}')
                            .then(data => console.log(data))
                            .catch(errors => console.log(errors));
                    @else
                        this.form.post('{{ route('modpack.store') }}')
                            .then(data => console.log(data))
                            .catch(errors => console.log(errors));
                    @endif
                }
            }
        });
    </script>
@endsection


