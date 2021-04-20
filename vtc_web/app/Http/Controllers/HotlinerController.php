<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Paiement;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class hotlinerController extends Controller
{
    public function addCourseInfoForm(){

        return view('vueHotliner');

    }

    public function clientPaiement(){
        //dd(request());
        request()->validate([
            'firstName'=>['required'],
            'clientName'=>['required'],
            'phoneNumber'=>['required'],
            'date'=>['required'],
            'hour'=>['required'],
            'nbPers'=>['required'],
            'startLocation'=>['required'],
            'endLocation'=>['required']
        ]);

        $info = [
            'firstName'=>request()->firstName,
            'clientName' =>request()->clientName,
            'phoneNumber' =>request()->phoneNumber,
            'date' =>request()->date,
            'hour' =>request()->hour,
            'nbPers' =>request()->nbPers,
            'startLocation' =>request()->startLocation,
            'endLocation' =>request()->endLocation
        ];
        session()->put('info', $info);
        return view('vuePaiement');
    }

    public function formulValidation(){

        $info = session()->get('info');
       
        request()->validate([
            'cardNumber'=>['required'],
            'expirationDate'=>['required'],
            'owner'=>['required'],
            'cvv'=>['required']
        ]);


        $paiement = [
            'cardNumber'=> request()->cardNumber,
            'expirationDate'=> request()->expirationDate,
            'owner'=> request()->owner,
            'cvv'=> request()->cvv
        ];


        $phraseOui = "Paiement validé";
        $phraseNon = "Paiement refusé";

        if($this->savingCourse(array_merge($info,$paiement))) {
            return view('formValidation',["phrase"=>$phraseOui]);
        }else{
            return view('formValidation',["phrase"=>$phraseNon]);
        }

    }

    public function savingCourse($array) {

        $idCLient = null;
        $idPaiement = null;

        if($this->testPaiement($array["cardNumber"], $array["expirationDate"], $array["owner"], $array["cvv"])) {

            $client = Client::where('prenomClient', $array["firstName"])->where('nomClient', $array["clientName"])->where('tel', $array["phoneNumber"])->first();

            if ($client != null) {

                $idClient = $client->idClient;

            } else {

                $idClient = Client::insertGetId([
                        "prenomClient" => $array["firstName"],
                        "nomClient" => $array["clientName"],
                        "tel" => $array["phoneNumber"]

                    ]);

            }
            $idPaiement = Paiement::insertGetId([
                    "numCB" => $array["cardNumber"],
                    "dateExepiCB" => $array["expirationDate"],
                    "titulaire" => $array["owner"],
                    "CVV" => $array["cvv"]
                ]);

            Transaction::create([
                'numTransaction' => 20000000000000000000,
                'gpsDepart' => $array["startLocation"],
                'dateTransaction' => date('Y-m-d', time()),
                'gpsArrive' => $array["endLocation"],
                'heureDepart' => $array["hour"],
                'dateDepart' => $array["date"],
                'courseEffectuee' => 0,
                'nbPassager' => $array["nbPers"],
                'idClient' => $idClient,
                'idPaiement' => $idPaiement,
            ]);

            return true;
        } else {
            return false;
        }


    }

    public function testPaiement($cardNumber, $expirationDate, $owner, $cvv) {
        return true;
    }

}
