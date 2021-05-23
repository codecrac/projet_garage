<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Scalar\String_;

class MarqueAndModelesController extends Controller
{
    public function enregistrer_liste_de_marque(Request $request){
        $this->validate($request,
            ['fichier_marque'=> 'required|mimes:xls,xlsx']
        );
        $path = $request->file('fichier_marque')->getRealPath();
        $data = Excel::import(Array(),$path);
        dd(var_dump($data));
//        if($data)
    }
}
