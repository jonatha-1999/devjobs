<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(vacante $vacante)
    {
        //
        return view('candidatos.index', [
            'vacante' => $vacante
        ]);
    }


}
