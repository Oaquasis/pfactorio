<?php

namespace pfactorio\Http\Controllers;

use pfactorio\Modpack;
use Illuminate\Http\Request;

class ModpackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modpack = Modpack::all();

        return view('admin.modpack.index', compact('modpack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modpack.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modpack = new Modpack($request->all());
        $modpack->save();

        return redirect()->back();
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
    }
}
