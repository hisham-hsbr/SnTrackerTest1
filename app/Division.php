<?php

namespace App;


use App\BottomPrice;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

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
