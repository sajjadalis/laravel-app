<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getSlugAttribute(): string
    {
        return str_slug($this->name);
    }
    public function getUrlAttribute(): string
    {
        return action('UserController@profile', [$this->id, $this->slug]);
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function pages(){
        return $this->hasMany('App\Page');
    }
}
