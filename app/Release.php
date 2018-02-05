<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'download_url', 'file_name', 'factorio_version','version', 'released_at', 'mod_id', 'mod_name'
    ];

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }
}
