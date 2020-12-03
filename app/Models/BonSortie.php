<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonSortie extends Model
{
    protected $table='bon_sorties';

    protected $fillable=[
        'nom_patient',
        'hotital_centre',
        'date_signature',
        'image',
    ];
}
