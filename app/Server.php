<?php

namespace pfactorio;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $fillable = [
        'name', 'dns_name','ip_address', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function getStatus(){
        switch($this->status){
            case 0:
                return "off";
                break;
            case 1:
                return "on";
                break;
            case 2:
                return "error";
                break;
        }
    }
}
