<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function listDriver(){
        /*$transction = DB::table('transaction')->pluck('idTransaction');
        foreach ($idTransactions as $idTransaction){
            echo $idTransaction;
        } */
        $transactions = \App\Models\Transaction::all();

        foreach ($transactions as $transaction) {
            echo $transaction;
        }


    return view('driver');
    }
}
