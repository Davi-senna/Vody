<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Log;

class LogController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_user' => 'required|max:20',
                'id_category' => 'required|max:20',
                'password' => 'required|max:128',
                'login' => 'required|max:128',
                'seconds' => 'required|max:11',
                'hour_value' => 'required|max:11',
            ]);

            $user = new UserController();

            $authentication = json_decode($user->auth($validatedData["login"], $validatedData["password"]));
            if ($authentication->success) {

                $show = Log::create($validatedData);

                $validate = [
                    'success' => true,
                    'message' => 'Log enviado com sucesso',
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

    public function show($id,$login,$password)
    {
        try {
            $user = new UserController();

            $authentication = json_decode($user->auth($login, $password));
            if ($authentication->success) {

                $result = Log::where(['id_user' => $id])->select('seconds','hour_value','created_at')->get();
                return json_encode([
                    "success" => true,
                    "data" => $result
                ]);
            } else {
                return json_encode([
                    "success" => false,
                    "message" => "Não foi possível encontrar esses logs"
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
