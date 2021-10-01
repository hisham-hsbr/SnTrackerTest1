<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Supplier;

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
}
