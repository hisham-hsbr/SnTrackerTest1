<?php

namespace App;


use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public function serialNumbers()
    {
        return $this->belongsToMany(SerialNumber::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class,'CreatedBy','id');
    }
}
