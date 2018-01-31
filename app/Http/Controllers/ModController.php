<?php

namespace pfactorio\Http\Controllers;

use pfactorio\Mod;
use Illuminate\Http\Request;

class ModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mods = Mod::all();

        return view('admin.mod.index', compact('mods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mod.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mod = new Mod($request->all());
        $mod->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \pfactorio\Mod  $mod
     * @return \Illuminate\Http\Response
     */
    public function show(Mod $mod)
    {
        return view('admin.mod.form', compact('mod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \pfactorio\Mod  $mod
     * @return \Illuminate\Http\Response
     */
    public function edit(Mod $mod)
    {
        return view('admin.mod.form', compact('mod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \pfactorio\Mod  $mod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mod $mod)
    {
        $mod->update($request->all());

        $mod->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \pfactorio\Mod  $mod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mod $mod)
    {
        $mod->delete();
    }
}
