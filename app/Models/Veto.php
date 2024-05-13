<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veto extends Model
{
    use HasFactory;
    protected $table = 'vetos';
    protected $fillable = [
        'nomcomplet', 'email', 'password', 'numtel', 'nom_cabinet',
        'heure_travail', 'frais_consultation', 'localisation', 'description', 'image'
    ];
}
