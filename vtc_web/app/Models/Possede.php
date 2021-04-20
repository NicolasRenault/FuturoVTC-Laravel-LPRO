<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Possede extends Model
{
    protected $table = "Possede";
    protected $primaryKey = ["typePermis", "idEmploye"];
    public $guarded = [];

    public $timestamps = false;
}
