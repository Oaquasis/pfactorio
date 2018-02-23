<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'title', 'owner','summary', 'downloads_count',
    ];



    public function modpacks(){
        return $this->belongsToMany(Modpack::class);
    }

    public function releases()
    {
        return $this->hasMany(Release::class);
    }

    public function latest_release(){
        return $this->hasOne(Release::class)->orderBy('version', 'asc');
    }
}
