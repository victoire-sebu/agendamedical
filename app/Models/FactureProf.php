<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureProf extends Model
{
    protected $table='facture_profs';

    protected $fillable=[
        'nom_patient',
        'hotital_centre',
        'date_signature',
        'image',
    ];

}
