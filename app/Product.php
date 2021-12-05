<?php

namespace App;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function serialNumbers()
    {
        return $this->belongsToMany(SerialNumber::class);
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
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
