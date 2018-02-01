@extends('pages.index')

@section('header')
    <div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Servers</h1>
        </div>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fal fa-home"></i></a></li>
            <li><a href="#">Admin</a></li>
            <li class="active">Servers</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="panel">
    <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-12 table-toolbar-right">
                    <a class="btn btn-purple" href="{{ route('server.create') }}"><i class="fal fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Version</th>
                    <th>DNS Name</th>
                    <th>IP Address</th>
                    <th>Port</th>
                    <th class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($servers))
                    @foreach($servers as $server)
                        <tr>
                            <td><a class="btn-link" href="{{ route('server.edit', $server) }}">{{ $server->name }}</a></td>
                            <td>{{ $server->version }}</td>
                            <td>{{ $server->dns_name }}</td>
                            <td>{{ $server->ip_address }}</td>
                            <td>{{ $server->port }}</td>
                            <td class="text-center">
                                @if($server->status == 0)
                                    <div class="label label-table label-danger">Off</div>
                                @elseif($server->status == 1)
                                    <div class="label label-table label-success">On</div>
                                @else
                                    <div class="label label-table label-warning">Error</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection