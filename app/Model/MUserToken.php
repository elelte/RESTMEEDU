<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MUserToken extends Model {

    protected $table = 'user_token';

    protected $fillable = ["token", "id_user"];

    public $timestamps = false;

    protected $primaryKey = null;

    protected $attributes = [
        'token'   => "",
        'id_user' => 0
    ];

}