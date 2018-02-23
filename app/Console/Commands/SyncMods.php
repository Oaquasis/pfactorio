<?php

namespace pfactorio\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use pfactorio\Events\ModsSynced;
use pfactorio\Mod;
use pfactorio\Release;

class SyncMods extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mods:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronize Mods with the Factorio ModPortal';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ModsSynced::dispatch("Synchronisation started...", "info");
        sleep(10);
//        $factorioMods = $this->getFactorioData($this->getFactorioApiPageSize());
//
//        foreach($factorioMods as $apiMod)
//        {
//            $mod = Mod::updateOrCreate([
//                'name' => $apiMod['name']
//            ],[
//                'title' => $apiMod['title'],
//                'owner' => $apiMod['owner'],
//                'summary' => $apiMod['summary'],
//                'downloads_count' => $apiMod['downloads_count']
//            ]);
//
//            $release = Release::updateOrCreate([
//                'version' => $apiMod['latest_release']['version'],
//                'mod_id' => $mod->id
//            ],[
//                'download_url' => $apiMod['latest_release']['download_url'],
//                'file_name' => $apiMod['latest_release']['file_name'],
//                'factorio_version' => $apiMod['latest_release']['info_json']['factorio_version'],
//                'released_at' => Carbon::parse($apiMod['latest_release']['released_at'])->toDateTimeString()
//            ]);
//        }
        ModsSynced::dispatch("Synchronisation completed...", "success");
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

}
