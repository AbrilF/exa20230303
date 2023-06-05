<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;

    protected $table = 'posts';

    protected $primaryKey = 'id';

    protected $dateTime = [
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
        'title',
        'body',
    ];
    //añadimos esto para la relacion uno a muchos User->posts
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relacion uno a muchos
    //una comunidad puede tener muchos posts
    public function communitys()
    {
        return $this->belongsTo(Community::class);
    }
    //relacion uno a muchos
    //un post puede tener muchos commentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

