<?php

namespace App;

use App\Brand;
use App\Division;
use Illuminate\Database\Eloquent\Model;

class BottomPrice extends Model
{
    //
    protected $fillable = [
        'code', 'name','fb','sb','tb','lb','rt','division_id',
    ];
    public function divisions()
    {
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function brands()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
