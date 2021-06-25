<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function customer()
    {
        return $this->belongsTo(related:Customer::class);
    }

    public function products()
    {
        return $this->belongsToMany(related:Product::class)
        ->withPivot (columns:'quantity');
    }
}
