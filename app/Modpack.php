<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Modpack extends Model
{
    /**
     * The roles that belong to the user.
     */
    public function mods()
    {
        return $this->hasMany(Mod::class);
    }

    public function servers()
    {
        return $this->belongsToMany(Server::class);
    }
}
