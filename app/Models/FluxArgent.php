<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FluxArgent extends Model
{
    public $table  = "flux_argent";
    public $guarded = [];

    public function vehicule(){
        return $this->belongsTo(Vehicule::class,'id_vehicule_concerner');
    }
}
