<div>
  <form wire:submit.prevent="savelead()">
        <div class="row">
          <div class="col-sm-6 mb-3">
                <input type="text" wire:model="inpName" placeholder="Nombre" class="form-control rounded-0" required>
          </div>
          <div class="col-sm-6 mb-3">
                <input type="text" wire:model="inpLastname" placeholder="Apellido" class="form-control rounded-0" required>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-3">
              <select name="" id="" wire:model="selCountry" class="form-control rounded-0" required>
                  <option value="">País de residencia</option>
                  @foreach ($countries as $country)
                    <option value="{{ $country->id}}">{{ $country->name_country }}</option>
                  @endforeach
              </select>
          </div>
          <div class="col-sm-6 mb-3">
              <select wire:model="selState" class="form-control rounded-0" required>
                  <option value="">Estado o Departamento</option>
                  @if(count($states) > 0)
                    @foreach ($states as $state)
                        <option value="{{ $state->name_state }}">{{ $state->name_state }}</option>
                    @endforeach
                  @endif
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 mb-3">
                <input type="number" wire:model="inpPhone" placeholder="Telefono" class="form-control rounded-0" required>
          </div>
          <div class="col-sm-6 mb-3">
                <input type="email" wire:model="inpEmail" placeholder="Email" class="form-control rounded-0">
          </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3">
                  <select wire:model="selInterest" class="form-control rounded-0" required>
                        <option value="">Interes - Tramite</option>
                        <option value="Poderes">Poderes</option>
                        <option value="Apostillas">Apostillas</option>
                        <option value="Traducciones">Traducciones</option>
                        <option value="Affidavit">Affidavit</option>
                        <option value="Acuerdos">Acuerdos</option>
                        <option value="Autorizaciones de Viaje">Autorizaciones de Viaje</option>
                        <option value="Cartas de Invitacion">Cartas de Invitacion</option>
                        <option value="Certificaciones">Certificaciones</option>
                        <option value="Contratos">Contratos</option>
                        <option value="Poderes Especiales">Poderes Especiales</option>
                        <option value="Revocatorias">Revocatorias</option>
                        <option value="Testamentos">Testamentos</option>
                  </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3">
                <textarea wire:model="txtMessage" rows="4" placeholder="Mensaje" class="form-control rounded-0" required></textarea>
            </div>
        </div>
        @if($saved)
          <div class="row">
            <div class="alert alert-warning rounded-0 alert-dismissible fade show w-100" role="alert">
              <strong>Lead Creado con Exito</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        @endif
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-success rounded-0">Guardar</button>
        </div>
      </form>
</div>
