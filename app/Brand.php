<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //

    public function BottomPrices()
    {
        return $this->hasMany(BottomPrice::class);
    }
}
