<?php

namespace pfactorio\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use pfactorio\Mod;
use Illuminate\Http\Request;
use pfactorio\Release;

class ModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $mods = Mod::with(['latest_release'])->get();

        return view('mod.index', compact('mods'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $mods = Mod::with(['latest_release'])->get();

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

        foreach($factorioMods as $apiMod)
        {
            $mod = Mod::updateOrCreate([
                'name' => $apiMod['name']
            ],[
                'title' => $apiMod['title'],
                'owner' => $apiMod['owner'],
                'summary' => $apiMod['summary'],
                'downloads_count' => $apiMod['downloads_count']
            ]);

            $release = Release::updateOrCreate([
                'version' => $apiMod['latest_release']['version'],
                'mod_id' => $mod->id
            ],[
                'download_url' => $apiMod['latest_release']['download_url'],
                'file_name' => $apiMod['latest_release']['file_name'],
                'factorio_version' => $apiMod['latest_release']['info_json']['factorio_version'],
                'released_at' => Carbon::parse($apiMod['latest_release']['released_at'])->toDateTimeString()
            ]);
        }
        return redirect()->back();
    }

    public function getFactorioData($pageSize)
    {
        $url = config('factorio.api_url')."?page_size=".$pageSize;

        return Cache::remember('factorioMods', 360, function() use ($url){
            $data = json_decode(file_get_contents($url), true);
            return $data["results"];
        });
        
        
    }

    public function getFactorioApiPageSize(){
        $factorioConfig = Cache::remember('factorioConfig', 360, function() {
            $data = json_decode(file_get_contents(config('factorio.api_url')), true);
            return $data["pagination"];
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
