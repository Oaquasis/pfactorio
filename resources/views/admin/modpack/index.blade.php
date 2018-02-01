@extends('pages.index')

@section('header')
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Modpacks</h1>
        </div>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fal fa-home"></i></a></li>
            <li><a href="#">Admin</a></li>
            <li class="active">Modpacks</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-12 table-toolbar-right">
                        <a class="btn btn-purple" href="{{ route('modpack.create') }}"><i class="fal fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            @if(isset($modpacks) && $modpacks->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Version</th>
                        <th>Server</th>
                        <th>Last modified</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($modpacks as $modpack)
                            <tr>
                                <td>
                                    <a href="{{ route('modpack.edit', $modpack) }}" class="btn-link">
                                        {{ $modpack->name }}
                                    </a>
                                </td>
                                <td>{{ $modpack->version }}</td>
                                <td>{{ isset($modpack->server) ? $modpack->server->name : '' }}</td>
                                <td>{{ $modpack->updated_at }}</td>
                                <td>
                                    <a href="{{ route('modpack.destroy', $modpack) }}" onclick="event.preventDefault(); document.getElementById('destroy-{{ $modpack->id }}-form').submit();">
                                        <i class="fal fa-minus-circle"></i>
                                    </a>
                                    <form id="destroy-{{ $modpack->id }}-form" action="{{ route('modpack.destroy', $modpack) }}" method="POST" style="display: none;">{{ method_field('DELETE') }}{{ csrf_field() }}</form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                No modpacks found.
            @endif
        </div>
    </div>
@endsection