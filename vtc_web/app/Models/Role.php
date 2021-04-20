<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "Role";
    protected $primaryKey = "typeRole";
    protected $keyType = "string";

    public $timestamps = false;
}
