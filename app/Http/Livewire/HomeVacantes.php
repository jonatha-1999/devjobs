<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario; 

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;     
    }

    public function render()
    {
       // $vacante = vacante::all();

        $vacante = vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino ."%");
        })

        ->when($this->categoria, function($query){
                $query->where('categoria_id', $this->categoria);

        })

        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);

    })

        ->paginate(20);


        return view('livewire.home-vacantes', [
            'vacantes' => $vacante
        ]);
    }
}
