<div class="text-center form" style="background-color: #002542; border-radius: 5px">
    <h4 class="text-white pt-4 px-4" style="margin: 10px 10px 10px 10px;">¿Es abogado y quiere anunciarse en Estados Unidos?</h4>
    <p class="text-white">Sea parte de nuestro equipo AHORA!</p>
    <form id="demo-form" action="{{ route('socios.registro') }}" method="POST" onsubmit="return evitarSpam();">        
        @csrf
        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
            <input style="margin-right: 1%; font-size: 15px" type="text" class="form-control" placeholder="Nombre" name="name" autocomplete="off" value="{{ old('name')}}" required>
            <input style="font-size: 14px" type="text" class="form-control" placeholder="Apellido" name="lastname" autocomplete="off" value="{{ old('lastname')}}" required>
        </div>
        @error('name')
            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div id="divpais" class="form-group mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
            <select style="font-size: 14px; width: 93%" name="country_residence" id="country_residence" class="form-control" required>
                <option value="">País de residencia</option>
                <option value="Argentina">Argentina</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Chile">Chile</option>
                <option value="Colombia">Colombia</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Ecuador">Ecuador</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Honduras">Honduras</option>
                <option value="México">México</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Panamá">Panamá</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Perú">Perú</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="República Dominicana">República Dominicana</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Venezuela">Venezuela</option>  
            </select>
            {{-- <div id="divcodigoandtelefono" class="d-flex align-items-center" style="width: 51%">
                <div class="bg-white ml-1 h-100 pt-1 px-2" style="border-radius: 5px 0px 0px 5px; height: 100% !important">
                    <img id="imgcodcountry" alt="">
                </div>
                <input type="text" style="background-color: #ffffff; font-size: 14px; border-radius: 0px 0px 0px 0px; border-left: none; width: 35%; padding-left: 0px" name="codTelfPais" id="codTelfPais" class="form-control" readonly>
                <input style="margin-left: 0px; font-size: 14px; border-radius: 0px 5px 5px 0px;" type="number" name="phone" class="form-control" id="telefono" placeholder="Teléfono" autocomplete="off" value="{{ old('phone') }}" required>
            </div> --}}
            <div class="input-group" id="divcodigoandtelefono" style="margin-left: 5px; background-color: white !important; border-radius: 5px 5px 5px 5px !important">
                <div class="input-group-prepend" style="border-right: none !important; background-color: white !important;">
                  <img class="input-group-text" width="100%" height="35px" style="padding-left: 3px; padding-right: 3px; background-color: white !important;" id="imgcodcountry" alt="">
                </div>
                <div style="width: 55px; border-right: none !important; background-color: white !important" class="text-center">
                    <input type="text" class="form-control" name="codTelfPais" id="codTelfPais" style="font-size: 14px; padding-left: 0px; padding-right: 0px; border-left: none; background-color: white !important; border-radius: 0px" readonly>
                </div>
                <input type="number" name="phone" class="form-control" id="telefono" placeholder="Teléfono" style="font-size: 14px" value="{{ old('phone') }}" required>
            </div>
        </div>
        @error('country_residence')
            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        @error('phone')
            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        {{-- <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
            <select style="font-size: 14px" name="company" id="company" class="form-control" required>
                <option value="Empresa">Empresa</option>
                <option value="Libre Ejercicio">Libre Ejercicio</option>
            </select>
        </div> --}}
        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
            <input style="font-size: 14px" type="email" class="form-control" placeholder="Correo electrónico" name="email" autocomplete="off" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
            {{-- <input type="password" class="form-control" placeholder="Crea una contraseña para tu perfil" name="password" autocomplete="off" {{ old('password') }} required> --}}
            <div class="input-group">
                <input style="font-size: 14px" type="password" name="password" class="form-control" placeholder="Cree una contraseña" id="password" autocomplete="off" required>
                <div class="input-group-append" style="cursor: pointer" onclick="mostrarContrasena();"> {{--onmousedown="mostrarContrasena();" onmouseup="mostrarContrasena();"--}}
                  <span class="input-group-text" id="basic-addon2"><i id="eyePassword" class="fas fa-eye"></i></span>
                </div>
            </div>
        </div>
        @error('password')
            <div class="mb-2 d-flex" style="margin-left: 5%; margin-right: 5%">
                <span class="text-danger">{{ $message }}</span>
            </div>
        @enderror
            <div class="mb-2" style="display: none; margin-left: 5%; margin-right: 5%">
                <label style="color: #ffffff" for="nospam">Campo de control. Si lo ves ignóralo</label>
                <input type="text" name="nospam" id="controlspam">
            </div>
        <div class="mb-2" style="margin-left: 5%; margin-right: 5%">
            <button type="submit" class="btn btn-block" style="background-color: #FEC02F">Registrarse</button>
            {{-- class="g-recaptcha" data-sitekey="6LdI9cMeAAAAALgxUrh7mzlzFBlIV-F4Gzvbp2D8" data-callback='onSubmit' data-action='submit'--}}
        </div>
    </form>
    <div class="text-white">
        <div class="text-white">
            <hr class="bg-white mx-5">
            <p class="font-weight-bold">O</p>
        </div>
        <div class="mx-5 mb-4">
            <a class="btn" href="{{ url('login/facebook') }}" style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                Crear Cuenta con Facebook
            </a>
            <hr class="bg-white">
        </div>
    </div>
    <div class="pb-3">
        <p class="text-white" style="font-size: 20px"><b>¿Ya tiene una cuenta? <a href="{{route('partner.showform')}}">Iniciar Sesión</a></b></p>
    </div>
</div>