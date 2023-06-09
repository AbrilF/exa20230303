<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //RELACION UNO A MUCHOS
    //el nombre es en plural porque un usuario tiene muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //RELACION UNO A UNO
    //el nombre es en singular porque un usuario tiene un perfil
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //RELACION MUCHOS A MUCHOS 
    //el usuario tiene muchas comunidades
    public function communitys()
    {
        return $this->belongsToMany(Community::class);
    }



}
