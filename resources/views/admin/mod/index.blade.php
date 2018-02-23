@extends('pages.index')

@section('header')
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Mods</h1>
        </div>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fal fa-home"></i></a></li>
            <li><a href="#">Admin</a></li>
            <li class="active">Mods</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="pad-btm form-inline" id="PanelActions">
                <div class="row">
                    <div class="col-sm-12 table-toolbar-right">
                        <a class="btn btn-purple" href="{{ route('mod.create') }}"><i class="fal fa-plus"></i> Add manually</a>
                        <a class="btn btn-dark" href="{{ route('admin.mod.index') }}" onclick="event.preventDefault(); document.getElementById('Modsync-form').submit();">
                            <i class="fal fa-sync"></i>
                            Sync with Factorio
                        </a>
                        <form id="Modsync-form" @submit.prevent="onSubmit" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                @if(isset($mods) && $mods->count() > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Latest version</th>
                        <th>Time released</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($mods as $mod)
                            <tr>
                                <td>{{ $mod->name }}</td>
                                <td>{{ $mod->owner }}</td>
                                <td>{{ isset($mod->latest_release) ? $mod->latest_release->version : "No release found..."}}</td>
                                <td>{{ isset($mod->latest_release) ? $mod->latest_release->released_at : "..." }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    No mods found...
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        var Actions = new Vue({
            el: '#PanelActions',

            data: {
                form: new Form({
                    name: ''
                })
            },

            methods: {
                onSubmit() {
                    this.form.post('{{ route('admin.mod.index') }}')
                        .then(response => console.log(response))
                        .catch(errors => console.log(errors));
                }
            }
        });
    </script>
@endsection