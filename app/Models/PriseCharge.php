<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriseCharge extends Model
{
    protected $table='prise_charges';

    protected $fillable=[
        'nom_patient',
        'nom_medecin',
        'date_signature',
        'image',
    ];
}
