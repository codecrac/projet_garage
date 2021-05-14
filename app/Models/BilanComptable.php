<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BilanComptable extends Model
{
    protected $table = "bilan_comptable";
    protected $primaryKey = "mois_reference";
    public $timestamps = false;
    protected $guarded = [];
}
