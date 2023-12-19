<div class="bg-white position-fixed shadow box-chat position-relative pb-3" style="height: auto; width: 400px; bottom: 10px; right: 10px; z-index: 1000">
    <div class="position-absolute @if($sended) d-block @else d-none @endif" style="top: 75px; left: 15%; z-index: 3" id="alert">
        <p class="bg-white px-3 py-2 rounded-pill shadow position-relative">Información enviada con éxito ✅ <span class="font-weight-bold position-absolute bg-white rounded-circle border px-2" style="top: -7px; right: -10px; cursor: pointer;" onclick="this.parentElement.classList.add('d-none')">x</span></p>
    </div>
    <div style="background-color: #2B384D" class="pl-3 py-3 text-white d-flex align-items-center w-100">
        <div style="width: 10px; height: 10px; border-radius: 25px; background-color: rgb(30, 219, 30)"></div>
        <div class="w-100 ml-2">Chat Notaria Latina <span class="float-right pr-3" style="cursor: pointer; font-weight: 500; font-size: 18px" onclick="closeChat()">x</span></div>    
    </div>
    <div class="px-3 overflow-auto chatnl" id="chatnl" style="height: 450px; scroll-behavior: smooth">
        <div class="pt-3 pb-5">
            @for ($i = 0; $i < count($init); $i++)
                <div class="pl-5 mb-1 float-right">
                    <button class="btnoptions btn btn-outline-danger rounded-pill" style="font-size: 13px" wire:click="save('{{ $init[$i]['question'] }}')">{{ $init[$i]['question'] }}</button>    
                </div>
            @endfor
            @if(count($array_user_text)>0)
                @for($i = 0; $i < count($array_user_text); $i ++)
                    <div class="my-2 position-relative @if($array_user_text[$i]['user'] == "client") text-left bg-light d-flex align-items-center pl-3 shadow-sm @else float-right text-white pl-4 pr-4 py-2 d-flex align-items-center shadow-sm @endif" style="width: 80%; border-radius: 25px; @if($array_user_text[$i]['user'] != "client") background-color: #2B384D @endif">
                        {!! $array_user_text[$i]['content'] !!}
                        <div class="position-absolute" style="top: -13px; @if($array_user_text[$i]['user'] == "client") left: -10px; @else right:-5px @endif">
                            @if($array_user_text[$i]['user'] == "client")
                                <img width="20px" height="20px" src="{{ asset('img/user1.png') }}" alt="">
                            @else
                                <img width="25px" height="25px" src="{{ asset('faviconotarialatina-22.png') }}" alt="">
                            @endif
                        </div>
                    </div>
                    {{-- <p>@if($array_user_text[$i]['user'] == "robot"){{ $array_user_text[$i]['content'] }}@endif</p> --}}
                @endfor
                @if($showThreeAnswers)
                    @for ($i = 0; $i < count($init); $i++)
                        @if(!$init[$i]['viewed'])
                            <div class="pl-5 mb-1 float-right">
                                <button class="btnoptions btn btn-outline-danger rounded-pill" style="font-size: 13px" wire:click="save('{{ $init[$i]['question'] }}')">{{ $init[$i]['question'] }}</button>    
                            </div>
                        @endif
                    @endfor
                @endif
            @endif
            @if($answer != "")
                <p class="text-left bg-light d-flex align-items-center pl-3 shadow-sm" style="width: 80%; border-radius: 25px;">{{ $answer }}</p>
                @if(count($array_answer)>0)
                <div style="width: 80%">
                    @foreach ($array_answer as $arr_ans)
                        <button class="btn btn-outline-danger rounded-pill mb-3" style="font-size: 12px" wire:click="second_filter('{{$arr_ans}}')">{{ $arr_ans }}</button>
                    @endforeach
                </div>
                @endif
            @endif
        </div>
    </div>
    {{-- <div class="w-100 px-3 position-absolute d-flex mb-3" style="bottom: 0px">
        <input wire:model="request_user" type="text" value="" placeholder="Escriba 'Hola'" class="w-100 border-0" style="outline: none" required>
        <button wire:click="save('{{$request_user}}')" class="btn btn-success">Enviar</button>
    </div> --}}
</div>

<script>
    document.addEventListener("livewire:load", function(event) {
        window.livewire.hook('beforeDomUpdate', () => {
            // let sended = @this.sended;
            // let selCountryChat = document.getElementById('selCountryChat');
            // if(selCountryChat) changeState(selCountryChat);
            setTimeout(() => {
                let divscroll = document.getElementById('chatnl');
                divscroll.scrollTop = divscroll.scrollHeight;
            }, 100);
        });
    });


    const closeChat = () => {
        document.getElementById('chatnotaria').classList.add('d-none');
    }

    
    const validateCheckChat = () => {
        
        let check_accept_term_chat = document.getElementById('acceptedchat');
        let btnsubmitchat = document.querySelector('.btnsubmitchat');
        
        if(check_accept_term_chat && check_accept_term_chat.checked == true){ btnsubmitchat.disabled = false; }
        else { 
            if(btnsubmitchat){
                btnsubmitchat.disabled = true;
            }
        }
    }

    validateCheckChat();

    // function changeState(element){
    //         let selStateChat = document.getElementById('selStateChat');
    //         console.log(selStateChat.options.length);
    //         getstateschat(element.value);
    // }

    // const getstateschat = async (id) => {
        
    //     let selStateChat = document.getElementById('selStateChat');

    //     if(selStateChat){

    //         selStateChat.options.length = 0;
    //         const response = await fetch("{{url('getstates')}}/"+id );        
    //         const states = await response.json();
    //         console.log(states);
    //         let opt = document.createElement('option');
    //         opt.appendChild( document.createTextNode('Estado/Departamento') );
    //         opt.value = '';
    //         selStateChat.appendChild(opt);
    //             states.forEach(state => {
    //                 let opt = document.createElement('option');
    //                 opt.appendChild( document.createTextNode(state.name_state) );
    //                 opt.value = state.name_state;
    //                 selStateChat.appendChild(opt);
    //         });

    //     }

    // }

</script>