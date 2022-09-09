<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class userController extends Controller
{
    public function store(Request $request){
        try {
            
            $validatedData = $request->validate([
                'name' => 'required|max:64',
                'login' => 'required|max:128',
                'password' => 'required|max:128',
                'status' => 'required|max:1',
            ]);

            $show = User::create($validatedData);

            $validate = [
                'success' => true,
                'message' => 'Usuário cadastrado com sucesso',
                'id' => $show['id'],
            ];

            return $validate;

        } catch (\Throwable $e) {

            $validate = [
                'success' => false,
                'message' => "Não foi possível cadastrar esse usuário, por favor revise os dados inseridos e tente novamente",
                'error' => $e->getMessage(),
            ];

            return $validate;
        }
    }

    public function auth($login, $password){
        
        try {
            
            $result = User::where(['login' => $login, 'password' => $password])->get();
            if(count($result) > 0){
                return json_encode(["name" => $result[0]["name"], "id" => $result[0]["id"],"success" => true]);
            }else{
                return json_encode(["success" => false, "message" => "Usuário ou senha invalida"]);
            }

        } catch (\Throwable $e) {
            return json_encode(["success" => false, "message" => $e->getMessage()]);
        }
        
    }

    
}
