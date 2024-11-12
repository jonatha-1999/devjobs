<?php
namespace App\Http\Controllers;
use App\Models\vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', vacante::class);
        return view('vacantes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', vacante::class);
        return view('vacantes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( vacante $vacante)
    {
        return view('vacantes.show',[
            'vacante' => $vacante
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(vacante $vacante)
    {
        $this->authorize('update', $vacante);

        return view('vacantes.edit',[
            'vacante' =>  $vacante
        ]);
    }


}
