@extends('admin.partner.layouts.sidebar')

@section('title-socios', 'Subir Video - Partner')

@section('scripts')
    
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card rounded-0 shadow-sm">
                    <div class="card-header text-center bg-white">
                        <h5>Envienos su presentación</h5>
                    </div>
                    <div class="card-body">
                        <div id="upload-container" class="text-center">
                            <p>Sus clientes lo conocerán de cerca y querrán optar por sus servicios. El video debe ser una presentación personal que dure 1 minuto</p>
                            <button id="browseFile" class="btn btn-primary rounded-0">Subir video</button>
                            <p class="mt-3 font-weight-bold">También puede enviarnos mediante WhatsApp o correo electrónico</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a target="_blank" class="btn btn-success rounded-0" href="https://wa.me/13474283543?text=Le%20envío%20mi%20video%20de%20presentación%20😊">Enviar por WhatsApp</a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-success rounded-0" href="mailto:partners@casacredito.com">Enviar por correo</a>
                                </div>
                            </div>
                        </div>
                        <div  style="display: none" class="progress mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                        </div>
                    </div>
    
                    <div class="card-footer p-4" style="display: none">
                        <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                    </div>
                </div>
            </div>
            @if(isset(Auth::user()->url_video))
            {{-- <div class="row text-center justify-content-center mt-5"> --}}
                <div class="col-md-4">
                    <video class="lazy" width="100%" data-src="{{asset('storage/'.Auth::user()->url_video)}}" controls autoplay></video>
                </div>
            {{-- </div> --}}
            @endif
        </div>
    </div>
@endsection

@section('end-scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script type="text/javascript">
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: "{{ route('partner.upload.save', Auth::user()->id) }}",
        query:{_token:'{{ csrf_token() }}' } ,// CSRF token
        fileType: ['mp4'],
        chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('.card-footer').show();
        window.location.replace("{{route('partner.upload.form')}}");
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        console.log(response);
        alert('file uploading error.');
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }

    var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)};
</script>
@endsection