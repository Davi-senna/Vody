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

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_user' => 'required|max:20',
                'password' => 'required|max:128',
                'login' => 'required|max:128',
                'name' => 'required|max:128',
            ]);

            $user = new UserController();

            $authentication = json_decode($user->auth($validatedData["login"], $validatedData["password"]));
            if ($authentication->success) {

                $show = Category::create($validatedData);

                $validate = [
                    'success' => true,
                    'message' => 'Categoria criada com sucesso',
                    'id' => $show['id'],
                ];

                return json_encode($validate);
            } else {
                return json_encode([
                    "success" => false,
                    "message" => "Usuário invalido"
                ]);
            }
        } catch (\Throwable $e) {
            return json_encode([
                "success" => false,
                "message" => $e->getMessage()
            ]);
        };
    }
}
