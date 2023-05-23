<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id,$login,$password){
        $user = new UserController();

        $authentication = json_decode($user->auth($login,$password));
        if($authentication->success){
            $result = Category::where(['id_user' => $id])->select('id','name')->get();
            return json_encode([
                "success" => true,
                "data" => $result
            ]);

        }else{
            return json_encode([
                "success" => false,
                "message" => "Usuário invalido"
            ]);
        }
    }

    public function store(Request $request){
        
    }
}
