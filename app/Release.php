<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }
}
