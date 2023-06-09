<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'title',
        'body',

    ];

    //añadimos esto para la relacion uno a uno User->profile
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}