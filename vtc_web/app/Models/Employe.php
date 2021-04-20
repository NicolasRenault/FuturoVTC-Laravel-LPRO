<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = "Employe";
    protected $primaryKey = "idEmploye";

    public $timestamps = false;

    public static function getRoleLibelleByInt($typeRole) {
        switch($typeRole) {
                case(1):
                    echo 'Hotliner';
                    break;
                case(2):
                    echo 'Driver';
                    break;
                case(3):
                    echo 'RH';
                    break;
                case(4):
                    echo 'Comptable';
                    break;
                case(5):
                    echo 'Garagiste';
                    break;
        }
    }
}
