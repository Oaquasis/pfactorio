<?php

namespace pfactorio\Http\Controllers;

use Illuminate\Support\Facades\Cache;
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
        $factorioMods = $this->getFactorioData($this->getFactorioApiPageSize());

        dd($factorioMods[1]);

        $this->syncWithDatabase($factorioMods);





    }

    public function getFactorioData($pageSize)
    {
        $url = config('factorio.api_url')."?page_size=".$pageSize;

        return Cache::remember('factorioMods', 10, function() use ($url){
            $data = json_decode(file_get_contents($url), true);
            return $data["results"];
        });
        
        
    }

    public function getFactorioApiPageSize(){
        $factorioConfig = Cache::remember('factorioConfig', 360, function() {
            return json_decode(file_get_contents(config('factorio.api_url')), true);
        });

        return $factorioConfig["count"];
    }

    public function syncModsWithDatabase($modCollection)
    {
        foreach ($modCollection as $mod){
            Mod::updateOrCreate([
                'name' => $mod["name"]
            ],[
                'title' => $mod['title'],
                'summary' => $mod['summary'],
                'owner' => $mod['owner'],
                'downloads_count' => $mod['downloads_count']
            ]);
        }

        return true;
    }

}
