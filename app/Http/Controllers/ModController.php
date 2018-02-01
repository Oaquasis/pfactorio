<?php

namespace pfactorio\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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

        return redirect()->back();
    }

    public function syncWithFactorio()
    {
        dd($this->getFactorioApiPageSize());
    }

    public function getFactorioData($pageSize)
    {
        $url = config('factorio.api_url');
        $parameters = "?page_size=".$pageSize;
    }

    public function getFactorioApiPageSize(){
        if(Storage::disk('local')->exists('factorio_pagesize.json')){

        }else{
            $json = file_get_contents(config('factorio.api_url'));

        }

        $data = json_decode($json, true);

        dd($data["pagination"]["count"]);
    }

    private function storeOrGetCachedData($data, $file_name)
    {
        if(Storage::exists($file_name)){

            if(Storage::lastModified($file_name)){

                Storage::put($file_name, $data);
                return $data;

            }else{

                return Storage::get($file_name);

            }

        }

        Storage::put($file_name, $data);
        return $data;

    }
}
