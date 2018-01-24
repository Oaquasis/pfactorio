<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Log extends Model
{
    protected $logContents;

    public function getDummy(){
        $this->logContents = File::get(asset('storage/factorio_current.log'));
    }

    public function getOnlineUsers(Log $log){
        $pattern = "/[JOIN]/";

    }
}
