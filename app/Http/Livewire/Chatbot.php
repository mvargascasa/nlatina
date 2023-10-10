<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class Chatbot extends Component
{

    public $text_bot = "¿En que podemos ayudarle?";
    public $request_user = "";
    public $array_user_text = [];
    public $answer = "";
    public $array_answer = [];
    public $showThreeAnswers = true;
    public $locationview = false; public $contactview = false; public $abogadosview = false; public $tramitesview = false;

    //variables para formulario
    public $chatname = "";public $chatphone = ""; public $chatemail = ""; public $chatcountry = ""; public $chatinterest = ""; public $chatmessage = "";

    public $sended = false;

    
    public $location = "
    Contamos con tres oficinas: <br>
    🚩 New York <br>
    🚩 New Jersey <br>
    🚩 Florida 
    ";

    public $contact = "
    <div>
        Puede llamarnos a los siguientes números: <br>
        📞 NY: <a class='text-white' href='tel:+13479739888'>347-973-9888</a> <br>
        📞 NJ: <a class='text-white' href='tel:+19088009046'>908-800-9046</a> <br>
        📞 FL: <a class='text-white' href='tel:+13056003290'>305-600-3290</a> <br>
    </div>
    ";

    public $tramites = "
    <section class='container'>
    <p class='text-center mt-2 font-weight-bold'>Complete su información</p>
    <div class='d-flex justify-content-center'>
        <form wire:submit.prevent='sendform()' id='form-chat'>
            <input wire:model='chatname' type='text' placeholder='Nombre y Apellido' class='form-control rounded-0 mb-2' required>
            <input wire:model='chatphone' type='number' placeholder='Número' class='form-control rounded-0 mb-2' required>
            <input wire:model='chatemail' type='email' placeholder='Correo eléctrónico' class='form-control rounded-0 mb-2' required>
            <select class='form-control rounded-0 mb-2' wire:model='chatcountry' required>
              <option value=''>País de residencia</option>
              <option value='Argentina'>Argentina</option>
              <option value='Bolivia'>Bolivia</option>
              <option value='Colombia'>Colombia</option>
              <option value='Costa Rica'>Costa Rica</option>
              <option value='Ecuador'>Ecuador</option>
              <option value='El Salvador'>El Salvador</option>
              <option value='España'>España</option>
              <option value='Estados Unidos'>Estados Unidos</option>
              <option value='Guatemala'>Guatemala</option>
              <option value='Honduras'>Honduras</option>
              <option value='México'>México</option>
              <option value='Nicaragua'>Nicaragua</option>
              <option value='Panamá'>Panamá</option>
              <option value='Paraguay'>Paraguay</option>
              <option value='Perú'>Perú</option>
              <option value='Puerto Rico'>Puerto Rico</option>
              <option value='República Dominicana'>República Dominicana</option>
              <option value='Uruguay'>Uruguay</option>
              <option value='Venezuela'>Venezuela</option>
            </select>
            <select class='form-control rounded-0 mb-2' wire:model='chatinterest' required>
                <option value=''>Tramite a realizar</option>
                <option value='Poderes'>Poderes</option>
                <option value='Apostillas'>Apostillas</option>
                <option value='Traducciones'>Traducciones</option>
                <option value='Certificiones'>Certificaciones</option>
                <option value='Affidavit'>Affidavit</option>
                <option value='Revocatoria'>Revocatoria</option>
                <option value='Acuerdos'>Acuerdos</option>
                <option value='Cartas de Invitación'>Cartas de Invitación</option>
                <option value='Travel Authorization'>Travel Authorization</option>
                <option value='Contratos'>Contratos</option>
                <option value='Testamentos'>Testamentos</option>
            </select>
            <input type='text' wire:model='chatmessage' placeholder='Mensaje' class='form-control rounded-0 mb-2' required>
            <div class='d-flex justify-content-center'>
                <button class='btn btn-warning rounded-pill my-2'>Enviar</button>
            </div>
        </form>
    </div>
  </section>";

    public $abogados = "
        <div>
            Puede ingresar al siguiente enlace, elegir su país de residencia y seleccionar un abogado: <br>
            <a href='https://notarialatina.com/abogados' class='btn btn-light rounded-pill shadow text-dark font-weight-bold'>Ver Abogados 🌐</a>
        </div>
    ";

    //variables para realizar un poder notarial
    public $name, $lastname, $state, $phone, $email, $document;

    public $init = [
        ['question' => '¿En donde están ubicados?', 'viewed' => false],
        ['question' => '¿Cómo puedo contactarme con Notaria Latina?', 'viewed' => false],
        ['question' => 'Necesito realizar un trámite', 'viewed' => false],
        ['question' => 'Requiero los servicios de un abogado', 'viewed' => false]
    ]; 

    public function getTextBotProperty(){
        return $text_bot;
    }

    public function getRequestUserProperty(Request $request){
        dd($request->user_text);
    }

    public function save_input(){
        array_push($this->array_user_text, ['user' => 'client', 'content' => $this->request_user]);
        $this->request_user = "";
    }

    public function save($option){
        
        array_push($this->array_user_text, ["user" => "client", 'content' => $option]);

        for ($i=0; $i < count($this->init); $i++) {
            if($this->init[$i]['question'] == $option) $this->init[$i]['viewed'] = true;
        }

        if($this->init[0]['viewed'] == true && $this->init[1]['viewed'] == true && $this->init[2]['viewed'] == true && $this->init[3]['viewed'] == true) $this->showThreeAnswers = false;

        switch($option){
            case "¿En donde están ubicados?":
                $this->locationview = true;
                $this->verifyUserRequest($this->location);
            break;
            case "¿Cómo puedo contactarme con Notaria Latina?":
                $this->contactview = true;
                $this->verifyUserRequest($this->contact);
            break;
            case "Necesito realizar un trámite":
                $this->tramitesview= true;
                $this->verifyUserRequest($this->tramites);
            break;
            case "Requiero los servicios de un abogado":
                $this->abogadosview = true;
                $this->verifyUserRequest($this->abogados);
            break;
            default: 
                $this->request_user = "";
                //dd("No entiendo lo que tratas de decir, intenta escribiendo 'Hola'");
            break;
        }

    }

    public function first_filter($option){
        switch ($option) {
            case 'Necesito realizar un tramite notarial':
                $this->answer = "¿Qué trámite necesita realizar?";
                $this->array_answer = ['Poderes', 'Apostillas', 'Traducciones', 'Certificaciones', 'Affidavit', 'Carta de Invitación'];
                break;
            
            default:
                # code...
                break;
        }
    }

    public function second_filter($option){
        switch($option){
            case "Poderes": 
                $this->answer = "¿En qué estado necesita realizar el trámite?";
                $this->array_answer = ['New York', 'New Jersey', 'Florida'];
            break;
        }
    }

    public function verifyUserRequest($answer){
        array_push($this->array_user_text,  ['user' => 'robot', 'content' => $answer]);
        //dd($this->array_user_text);
        //if($this->locationview == true && $this->contactview == true && $this->abogadosview == true) $this->showThreeAnswers = true;
    }

    public function sendform(){
        
        $message = "<br><strong>Nuevo Lead</strong>
        <br><b> Nombre: </b> ". strip_tags($this->chatname)."
        <br><b> País: </b> " . strip_tags($this->chatcountry) . "
        <br><b> Telef: </b> ". strip_tags($this->chatphone) . "
        <br><b> Email: </b> " . strip_tags($this->chatemail) ."
        <br><b> Interes: </b> ".strip_tags($this->chatinterest)."
        <br><b> Mensaje: </b> ".strip_tags($this->chatmessage)."
        <br><b> Fuente: </b> Chat Notaria Latina";
        
        $header='';
        $header .= 'From: <lead_chat@notarialatina.com>' . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        $sendedmail = mail('sebas31051999@gmail.com','Lead ' . strip_tags($this->chatname), $message, $header);

        if($sendedmail){
            $this->chatname = "";
            $this->chatcountry = "";
            $this->chatphone = "";
            $this->chatemail = "";
            $this->chatinterest = "";
            $this->chatmessage = "";
            $this->sended = true;
        }
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}
