<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class CategoryController extends Controller
{
    public function show($id,$login,$password){
        $user = new UserController();

        $authentication = json_decode($user->auth($login,$password));
        if($authentication->success){
            
        }
    }
}
