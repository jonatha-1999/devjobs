<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">

                <!-- Titulo Vacante -->

       <div>
         <x-label for="titulo" :value="__('Titulo Vacante')" />

         <x-input 
         id="titulo" 
         class="block mt-1 w-full" 
         type="text" 
         wire:model="titulo" 
         :value="old('titulo')" 
         aria-placeholder="Titulo Vacante"
          />
        @error('titulo')
           <livewire:mostrar-alerta :message="$message"/>
        @enderror
        </div>

                    <!-- Salario Mensual -->

        <div>
            <x-label for="salario" :value="__('Salario Mensual')" />
            
            <select
            id="salario"
            wire:model="salario"
            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario)
            <option value="{{ $salario->id  }}">{{$salario->salario}}</option>
                
            @endforeach
            </select>

            @error('salario')
            <livewire:mostrar-alerta :message="$message"/>
            @enderror

           </div>

                       <!-- Categoria -->
           <div>
            <x-label for="categoria" :value="__('Categoria')" />
            
            <select
            id="categoria"
            wire:model="categoria"
            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id  }}">{{$categoria->categoria}}</option>
                
            @endforeach

            </select>

            @error('categoria')
            <livewire:mostrar-alerta :message="$message"/>
            @enderror

           </div>

                        <!-- Empresa -->          

           <div>
            <x-label for="empresa" :value="__('Empresa')" />
   
            <x-input  
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            :value="old('empresa')" 
            aria-placeholder="Empresa: ej. Netflix, Uber, Shoopify. "
             />

             @error('empresa')
             <livewire:mostrar-alerta :message="$message"/>
              @enderror
   
           </div>


                          <!-- Fecha -->  

             <div>
            <x-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
   
            <x-input  
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia" 
            :value="old('ultimo_dia')" 
             />
             @error('ultimo_dia')
             <livewire:mostrar-alerta :message="$message"/>
             @enderror
           </div>


                          <!-- Descripcion -->  

             <div>
            <x-label for="descripcion" :value="__('Descripción')" />
   
                <textarea
                 wire:model="descripcion" 
                 placeholder="Descripción general del puesto, experiencia etc."
                 class="h-72 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                 


                </textarea>
                @error('descripcion')
                <livewire:mostrar-alerta :message="$message"/>
             @enderror
              </div>


           
                <!-- Imagen-->

       <div>
        <x-label for="imagen" :value="__('Imagen')" />

        <x-input 
        id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model="imagen" 
        accept="image/*"
         />

         <div class="my-5 w-80">
          @if ($imagen)
            Imagen:
            <img src="{{$imagen->temporaryUrl() }}">
          @endif
         </div>

         @error('imagen')
         <livewire:mostrar-alerta :message="$message"/>
         @enderror
       </div>

       <x-button>
        Crear Vacante
       </x-button>
   

</form>