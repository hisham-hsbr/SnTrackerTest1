<?php

namespace App;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //

    public function BottomPrices()
    {
        return $this->hasMany(BottomPrice::class);
    }

    public function createdUser()
    {
        return $this->belongsTo(Admin::class,'CreatedBy','id');
    }
    public function updatedUser()
    {
        return $this->belongsTo(Admin::class,'UpdatedBy','id');
    }
}
