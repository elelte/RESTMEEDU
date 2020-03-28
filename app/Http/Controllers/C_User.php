<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TokenUsersController;

class C_User extends Controller {

    const MODEL = "App\Model\MUser";

    public function register(Request $request) {    

        $model = self::MODEL;
        $email = $request->get("email");

        $data_user = $model::where('email', '=', $email);

        if ($data_user->count() > 0) {
            // user found
            return ResponseTemplate(0, 200, "email sudah digunakan");
        }
        else{
            $data = $model::create($request->all());
            return ResponseTemplate(1, 200, "Daftar berhasil");
        }

    }

    public function login(Request $request) {

        $model = self::MODEL;
        $email = $request->get("email");
        $pass  = $request->get("password");

        $data_user = $model::where('email', '=', $email)
                           ->where('password', '=', $pass);


        if ($data_user->count() > 0) {

            //generate token
            $token = str_random(32);

            //
            $user = $data_user->first();
            $user->token = $token;

            //update token
            $tu_controller = new C_UserToken();
            $tu_controller->generate_token($token, $user->id);

            // user found
            return ResponseTemplate($user, 200, "Login berhasil");
        }
        else{
            return ResponseTemplate(0, 404, "User tidak ditemukan");
        }
    }

}
