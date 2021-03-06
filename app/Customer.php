<?php

namespace App;

use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public function serialNumbers()
    {
        return $this->belongsToMany('App\serialNumber', 'serial_number_customers');
    }
    public function getRouteKeyName()
    {
        return 'slug';
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
