<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    //añadimos esto para la relacion muchos a muchos User->communitys
    public function users()
    {
        return $this->hasMany(User::class);
    }

    //relacion uno a muchos
    //una comunidad puede tener muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}