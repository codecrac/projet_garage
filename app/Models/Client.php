<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $guarded = [];
    public $timestamps = false;

    public function vehicules(){
        return $this->hasMany(Vehicule::class,'id_client');
    }

}
