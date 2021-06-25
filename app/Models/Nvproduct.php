<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nvproduct extends Model
{
    protected $fillable=[
        'name',
        'img',
        'decription'
        ];

    public function product(){
        return $this->belongsTo('App\models\Product');
    }
}
