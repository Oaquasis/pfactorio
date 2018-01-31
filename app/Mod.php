<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    public function modpacks(){
        return $this->belongsToMany(Modpack::class);
    }
}
