<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function AddAdmin(Request $req){
        $admin=new User;
        $admin->name=$req->input('name');
        $admin->email=$req->input('email');
        $admin->password= Hash::make($req->input('password'));
        $admin->save();
        return $admin;
    }
}
