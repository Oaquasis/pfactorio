@extends('pages.index')

@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Servers</h3>
    </div>
    <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-6 table-toolbar-left">
                    <button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> Add</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>DNS Name</th>
                    <th>IP Address</th>
                    <th class="text-center">Status</th>
                    <th class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                @if(isset($servers))
                    @foreach($servers as $server)
                        <tr>
                            <td>{{ $server->name }}</td>
                            <td>{{ $server->dns_name }}</td>
                            <td>{{ $server->ip_address }}</td>
                            <td class="text-center">
                                @if($server->status == 0)
                                    <div class="label label-table label-danger">Off</div>
                                @elseif($server->status == 1)
                                    <div class="label label-table label-success">On</div>
                                @else
                                    <div class="label label-table label-warning">Error</div>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($server->is_primary == 1)
                                    <div class="label label-table label-success">Primary</div>
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