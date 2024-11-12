<?php

namespace App\Http\Livewire;

use App\Models\vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
        use WithFileUploads;
        
        public $cv;
        public $vacante;

        protected $rules =[
            'cv' => 'required|mimes:pdf'
        ];

        public function mount(vacante $vacante)
        {
            $this->vacante = $vacante;
        }

        public function postularme()
        {

            $datos = $this->validate();


            // Almacenar el CV
            $cv = $this->cv->store('public/cv');
            $datos['cv'] = str_replace('public/cv/', '', $cv);


            // Crear el candidato a la Vacante
            $this->vacante->candidatos()->create([
                'user_id'=> auth()->user()->id,
                'cv'=> $datos['cv']
            ]);


            // Crear notificacion y enviar el email
            $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id ));


            // Mostrar a usuario mensaje de OK
            session()->flash('mensaje', 'se envio correctamente tu informacion, muchos exitos.');

            return redirect()->back();
        }

        public function render()
        {
            return view('livewire.postular-vacante');
        }
}
