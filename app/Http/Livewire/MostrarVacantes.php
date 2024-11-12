<?php

namespace App\Http\Livewire;

use App\Models\vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    protected $listeners =['eliminarVacante'];

    public function eliminarVacante( vacante $vacante)
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = vacante::where('user_id', auth()->user()->id )->paginate(10);
        
        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
