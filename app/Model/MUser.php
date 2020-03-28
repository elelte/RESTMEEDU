<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MUser extends Model {

    protected $table = 'users';

    protected $fillable = ["email", "username", "password"];

    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];
    
    public static $rules = [
        'email'    => 'required',
        'password' => 'required'
    ];

    // Relationships
}
