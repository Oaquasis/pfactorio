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
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-12 table-toolbar-right">
                        <a class="btn btn-purple" href="{{ route('mod.create') }}"><i class="fal fa-plus"></i> Add own Mod</a>
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
                                <td>{{ $mod->latest_release->version }}</td>
                                <td>{{ $mod->latest_release->released_at }}</td>
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