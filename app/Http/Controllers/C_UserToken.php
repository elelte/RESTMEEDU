<?php namespace App\Http\Controllers;

class C_UserToken extends Controller {

    const MODEL = "App\Model\MUserToken";

    function generate_token($token, $id_user) {   

        $model = self::MODEL;

        $data_token = $model::where('id_user', '=', $id_user);

        if ($data_token->count() > 0) {
            $data = $data_token->first();
            $data->token = $token;
            $data->save();
        }
        else{
            $inputs = [ 'token'   => $token, 
                        'id_user' => $id_user];
            $model::create($inputs);
        }
    }

}
