<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Employe;
use App\Models\Possede;
use App\Models\Role;

class HRController extends Controller
{
    public function initHRView()
    {

        $employees = Employe::all();
        $roles = Role::all();
        return view('vueHR', ['employees' => $employees, 'roles' => $roles]);
    }

    public function initFormEmploye($idEmploye)
    {
        $employe = Employe::find($idEmploye);
        $roles = Role::all();

        if ($employe != null) {
            return view('formEmploye', ['employe' => $employe, 'roles' => $roles]);
        } else {
            abort(403, 'Id employe incorrect');
        }
    }

    public function initCreateFormEmploye()
    {
        return view('formEmploye', ['roles' => Role::all()]);
    }

    public function deleteEmploye($idEmploye)
    {
        $employe = Employe::find($idEmploye);

        if ($employe != null) {
            $employe->delete();
            $this->initHRView();
        } else {
            abort(403, 'Id employe incorrect');
        }
    }

    public function updateEmploye()
    {
        $employe = Employe::find(request()->idEmploye);
        if ($employe == null) {
            $employe = new Employe();
        }
        $employe->nomEmploye = request()->nomEmploye;
        $employe->prenomEmploye = request()->prenomEmploye;
        $employe->matricule = request()->matricule;
        $employe->typeRole = request()->role;

        $employe->save();

        if ($employe->typeRole == "CHF") {
            $permis = array(
                'A' => request()->A,
                'A1' => request()->A1,
                'A2' => request()->A2,
                'AM' => request()->AM,
                'B' => request()->B,
                'B1' => request()->B1,
                'B2' => request()->B2,
                'BE' => request()->BE,
                'BSR' => request()->BSR,
                'C' => request()->C,
                'C1' => request()->C1,
                'C1E' => request()->C1E,
                'CE' => request()->CE,
                'D' => request()->D,
                'D1' => request()->D1,
                'D2' => request()->D2
            );

            foreach ($permis as $keyPermi => $permi) {
                // $dbPermi = Possede::where("idEmploye",  $employe->idEmploye)->where("typePermis", $keyPermi)->first();
                $dbPermi = DB::table('Possede')
                    ->where("idEmploye",  $employe->idEmploye)
                    ->where("typePermis", $keyPermi);
                if ($dbPermi->first() != null && $permi == null) {
                    $dbPermi->delete();
                } else if ($dbPermi->first() == null && $permi != null) {

                    DB::insert('insert into Possede (typePermis, idEmploye) values (?, ?)', [$keyPermi,  $employe->idEmploye]);
                }
            }
        }
        return $this->initFormEmploye($employe->idEmploye);
    }
}
