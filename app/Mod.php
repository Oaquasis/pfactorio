<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    public function modpacks(){
        return $this->belongsToMany(Modpack::class);
    }

    public function releases()
    {
        return $this->hasMany(Release::class);
    }
}
