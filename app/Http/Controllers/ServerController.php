<?php

namespace pfactorio\Http\Controllers;

use Illuminate\Http\Request;
use pfactorio\Server;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();

        return view('admin.server.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.server.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'version' => 'required',
            'dns_name' => 'required',
            'ip_address' => 'required|ipv4'
        ]);

        $server = new Server($request->all());

        $server->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        return view('admin.server.form', compact('server'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        return view('admin.server.form', compact('server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        $request->validate([
            'name' => 'required',
            'version' => 'required',
            'dns_name' => 'required',
            'ip_address' => 'required|ipv4'
        ]);

        $server->update($request->all());

        $server->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        $server->delete();

        return redirect()->back();
    }

    public function switchStatus(Server $server, $status=null){

        if($status == null) {
            $server->status = $server->status== 1 ? 0 : 1;
        }else{
            $server->status = $status;
        }

        $server->save();

        return true;
    }
}
