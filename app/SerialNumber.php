<?php

namespace App;

use App\Product;
use App\Supplier;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class SerialNumber extends Model
{
    //
    protected $fillable = [
        'invoice', 'invoicesupplier','date','serialnumber','remark',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function Suppliers()
    {
        return $this->belongsToMany(Supplier::class);
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
