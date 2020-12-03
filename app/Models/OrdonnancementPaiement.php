<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdonnancementPaiement extends Model
{
    protected $table='ordonnancement_paiements';

    protected $fillable=[
        'nom_patient',
        'num_ordonnance',
        'date_signature',
        'image',
    ];
}
