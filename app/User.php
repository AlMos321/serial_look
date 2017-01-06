<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Validation rules
     */
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    );

    /**
     * Get user for serial.
     */
    public function serial()
    {
        return $this->hasMany('App\Serial');
    }

}
