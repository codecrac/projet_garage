<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    public $guarded = [];
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class,'id_client');
    }

    public function visites(){
        return $this->hasMany(Visite::class,'id_vehicule');
    }
}
