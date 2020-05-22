<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Str;
/**
 * Class User
 * @package App\Models
 * @version April 27, 2020, 8:45 am UTC
 *
 * @property string $email
 * @property string $password
 * @property string $token
 * @property string $remember_token
 */
class User extends Model
{

    public $table = 'users';
    
    public $fillable = [
        'email',
        'password',
        'token',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'token' => 'string',
        'remember_token' => 'string'
    ];

    public static $rules_register = [
        'email' => 'required',
        'password' =>  'required'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function updateUserToken()
    {
        $token = Str::random(60);

        $this->forceFill([
            'token' => hash('sha256', $token),
        ])->save();

        return $this;
    }

    
}
