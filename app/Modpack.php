<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Modpack extends Model
{

    protected $fillable = [
        'name', 'version'
    ];

    /**
     * The roles that belong to the user.
     */
    public function mods()
    {
        return $this->hasMany(Mod::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
