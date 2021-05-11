<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    public $table = "historique_visites";
    public $guarded = [];
    public $timestamps = false;


    public function client()
    {
        return $this->belongsTo(Client::class,'id_client');
    }
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class,'id_vehicule');
    }
}
