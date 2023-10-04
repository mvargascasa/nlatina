<div class="bg-white position-fixed shadow box-chat" style="height: 500px; width: 400px; bottom: 10px; right: 10px; z-index: 1000">
    <div style="background-color: #2B384D" class="pl-3 py-2 text-white">Chat Notaria Latina <span class="float-right pr-3" style="cursor: pointer" onclick="closeChat()">x</span></div>
    <div class="px-3 overflow-auto" id="chatnl" style="height: 450px; scroll-behavior: smooth">
        <div class="pt-3 pb-4">
            @for ($i = 0; $i < count($init); $i++)
                <div class="pl-5 mb-1 float-right">
                    <button class="btnoptions btn btn-outline-danger rounded-pill" style="font-size: 12px" wire:click="save('{{ $init[$i]['question'] }}')">{{ $init[$i]['question'] }}</button>    
                </div>
            @endfor
            @if(count($array_user_text)>0)
                @for($i = 0; $i < count($array_user_text); $i ++)
                    <div class="my-2 @if($array_user_text[$i]['user'] == "client") text-left bg-light d-flex align-items-center pl-3 shadow-sm @else float-right text-white pl-4 pr-4 py-2 d-flex align-items-center shadow-sm @endif" style="width: 80%; border-radius: 25px; @if($array_user_text[$i]['user'] != "client") background-color: #2B384D @endif">{!! $array_user_text[$i]['content'] !!}</div>
                    {{-- <p>@if($array_user_text[$i]['user'] == "robot"){{ $array_user_text[$i]['content'] }}@endif</p> --}}
                @endfor
                @if($showThreeAnswers)
                    @for ($i = 0; $i < count($init); $i++)
                        @if(!$init[$i]['viewed'])
                            <div class="pl-5 mb-1 float-right">
                                <button class="btnoptions btn btn-outline-danger rounded-pill" style="font-size: 12px" wire:click="save('{{ $init[$i]['question'] }}')">{{ $init[$i]['question'] }}</button>    
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
            @if($sended)
                <div class="bg-light px-3 pt-3 rounded-pill mt-2 mb-2 float-right rounded shadow w-75">
                    <p>Se envío su información ✅</p>
                </div>
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
        window.livewire.hook('element.updated', () => {
            setTimeout(() => {
                let divscroll = document.getElementById('chatnl');
                divscroll.scrollTop = divscroll.scrollHeight;
            }, 100);
        });
    });


    const closeChat = () => {
        document.getElementById('chatnotaria').classList.add('d-none');
    }
</script>