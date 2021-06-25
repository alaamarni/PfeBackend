<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;


class Customer extends Model
{
    use HasFactory, Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function orders()
    {
        return $this->belongsToMany(related:Order::class);
    }
}
