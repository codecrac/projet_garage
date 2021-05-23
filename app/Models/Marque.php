<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    protected $guarded = ['constructeur'];
//    public $primaryKey = 'constructeur';
    public $timestamps=false;
}
