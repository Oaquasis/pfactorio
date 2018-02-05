<?php

namespace pfactorio\Http\Controllers;

use pfactorio\Modpack;
use Illuminate\Http\Request;
use pfactorio\Server;

class ModpackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modpacks= Modpack::all();

        return view('admin.modpack.index', compact('modpacks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $modpacks= Modpack::all();

        return view('admin.modpack.index', compact('modpacks'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servers = Server::all();
        return view('admin.modpack.form', compact('servers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modpack = New Modpack([
            'name' => $request->get('name'),
            'version' => $request->get('version')
        ]);

        if($request->get('server') != null){
            Server::find($request->get('server'))->modpack()->save($modpack);
        }else{
            $modpack->save();
        }

        return redirect()->route('modpack.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \pfactorio\Modpack  $Modpack
     * @return \Illuminate\Http\Response
     */
    public function show(Modpack $modpack)
    {
        return view('admin.modpack.form', compact('modpack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \pfactorio\Modpack  $Modpack
     * @return \Illuminate\Http\Response
     */
    public function edit(Modpack $modpack)
    {
        return view('admin.modpack.form', compact('modpack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \pfactorio\Modpack  $Modpack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modpack $modpack)
    {
        $modpack->update($request->all());

        $modpack->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \pfactorio\Modpack  $Modpack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modpack $modpack)
    {
        $modpack->delete();

        return redirect()->back();
    }
}
