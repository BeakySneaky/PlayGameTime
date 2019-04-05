<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'prenom',
        'nom',
        'courriel',
        'commentaire',
    ];
}
