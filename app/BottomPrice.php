<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BottomPrice extends Model
{
    //
    protected $fillable = [
        'code', 'name','fb','sb','tb','lb','rt',
    ];
}
