<?php

// use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Partner\LoginController;
// use App\Http\Controllers\Partner\HomeController;

Auth::routes(['register' => false]);

Route::get('/test', 'LandingController@test');

Route::get('/home', 'HomeController@index')->name('home');

// CATEGORIES
Route::get('/home/categories', 'CategoryController@index')->name('category.index');
Route::get('/home/category/create', 'CategoryController@create')->name('category.create');
Route::post('/home/category/store', 'CategoryController@store')->name('category.store');
Route::get('/home/category/{category}', 'CategoryController@edit')->name('category.edit');
Route::put('/home/category/{category}', 'CategoryController@update')->name('category.update');
Route::delete('/home/category/{category}', 'CategoryController@destroy')->name('category.destroy');

// POST - BLOG
Route::get('/home/posts', 'PostController@index')->name('post.index');
Route::get('/home/post/create', 'PostController@create')->name('post.create');
Route::post('/home/post/store', 'PostController@store')->name('post.store');
Route::get('/home/post/{post}', 'PostController@edit')->name('post.edit');
Route::put('/home/post/{post}', 'PostController@update')->name('post.update');
Route::delete('/home/post/{post}', 'PostController@destroy')->name('post.destroy');

//PARTNERS
Route::get('/home/partners', 'PartnerController@index')->name('partner.index');
Route::post('/home/partners', 'PartnerController@index')->name('partner.index');
Route::get('/home/partners/create', 'PartnerController@create')->name('partner.form');
Route::post('/home/partners/store', 'PartnerController@store')->name('partner.store');
Route::get('/home/partners/latest', 'PartnerController@viewLastPublicated')->name('partner.show.latest.public');
Route::post('/home/partners/verify/{partner}', 'PartnerController@verifiEmailAdmin')->name('verify.email.admin');
Route::get('/home/partners/{partner}/show', 'PartnerController@show')->name('partner.show');
Route::put('/home/partners/{partner}', 'PartnerController@update')->name('partner.update');
Route::delete('/home/partners/delete/{id}', 'PartnerController@destroy')->name('partner.destroy');

// THANK
Route::get('/thank', 'LandingController@thank')->name('landing.thank');
Route::post('/thank', 'LandingController@thankpost')->name('landing.thankpost');
Route::post('/thanknj', 'LandingController@thankpostnj')->name('landing.thankpostnj');

//LANDING PAGES
Route::get('/apostillas-express-24-horas', 'LandingController@apostilla')->name('landing.apostilla');
Route::get('/gestion-online-estados-unidos', 'LandingController@notaria')->name('landing.notaria');

Route::get('/landing/newjersey', 'LandingController@newjersey')->name('office.nj');
Route::get('/landing/newjersey-web', 'LandingController@njweb')->name('office.njweb');
Route::get('/landing/newjersey-traducciones', 'LandingController@njtrad')->name('office.njtrad');
Route::get('/landing/newjersey-apostillas', 'LandingController@njapos')->name('office.njapos');
Route::get('/landing/newjersey-poderes', 'LandingController@njpod')->name('office.njpod');


Route::get('/landing/newyork', 'LandingController@newyork')->name('office.ny');
Route::get('/landing/newyork-web', 'LandingController@nyweb')->name('office.nyweb');
Route::get('/landing/newyork-traducciones', 'LandingController@nytrad')->name('office.nytrad');
Route::get('/landing/newyork-apostillas', 'LandingController@nyapos')->name('office.nyapos');
Route::get('/landing/newyork-poderes', 'LandingController@nypod')->name('office.nypod');


Route::get('/landing/florida', 'LandingController@florida')->name('office.fl');
Route::get('/landing/florida-web', 'LandingController@flweb')->name('office.flweb');
Route::get('/landing/florida-traducciones', 'LandingController@fltrad')->name('office.fltrad');
Route::get('/landing/florida-apostillas', 'LandingController@flapos')->name('office.flapos');
Route::get('/landing/florida-poderes', 'LandingController@flpod')->name('office.flpod');

//WEBSITE
Route::get('/', 'WebController@index')->name('web.index');

Route::get('post/{slug}','WebController@showpost')->name('post.slug');
Route::get('blog','WebController@showblog')->name('post.blog');

Route::get('consulados','WebController@consulados')->name('consul.index');
Route::get('consulado/{slug}','WebController@consulado')->name('consul.slug');

Route::get('socios/login', function(){ return redirect()->route('partner.showform');});
Route::get('socios', function(){ return redirect()->route('web.showallpartners');});

Route::group(['namespace' => 'Partner', 'prefix' => 'partners'], function(){
    Route::get('/home', 'HomeController@index')->name('socios.index')->middleware('auth:partner'); //verified
    Route::get('/login', 'LoginController@showLoginFormSocios')->name('partner.showform')->middleware('guest:partner'); // MOSTRAR FORMULARIO DE LOGIN
    Route::post('/login', 'LoginController@loginSocios')->name('socios.login');
    Route::post('/registro', 'RegisterController@register')->name('socios.registro'); //REGISTRO DEL SOCIO - WEB
    Route::get('/edit/{partner}', 'HomeController@edit')->name('socios.edit')->middleware('auth:partner'); // 'verified'
    Route::put('/update/{partner}', 'HomeController@update')->name('socios.update')->middleware('auth:partner'); //verified
    Route::post('/logout', 'LoginController@logout')->name('socios.logout')->middleware('auth:partner'); //verified

    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('socio.password.request');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('socio.password.email');

    Route::get('/password/reset/{token}/{email}', 'ResetPasswordController@showResetForm')->name('socio.password.reset');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('socio.password.update');

    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
});

Route::get('/ruta/escondida/cacheclear', function(){
    Artisan::call('cache:clear');
});

Route::get('/apostillas', function () {    return view('web.apostillas');    })->name('web.apostillas');
Route::get('/poderes', function () {    return view('web.poderes');    })->name('web.poderes');
Route::get('/traducciones', function () {    return view('web.traducciones');    })->name('web.traducciones');
Route::get('/affidavit', function () {    return view('web.affidavit');    })->name('web.affidavit');
Route::get('/acuerdos', function () {    return view('web.acuerdos');    })->name('web.acuerdos');
Route::get('/autorizaciones', function () {    return view('web.autorizaciones');    })->name('web.autorizaciones');
Route::get('/cartas-de-invitacion', function () {    return view('web.invitacion');    })->name('web.invitacion');
Route::get('/certificaciones', function () {    return view('web.certificaciones');    })->name('web.certificaciones');
Route::get('/contratos', function () {    return view('web.contratos');    })->name('web.contratos');
Route::get('/poderes-especiales', function () {    return view('web.poderesp');    })->name('web.poderesp');
Route::get('/revocatorias', function () {    return view('web.revocatorias');    })->name('web.revocatorias');
Route::get('/testamentos', function () {    return view('web.testamentos');    })->name('web.testamentos');

//PARTNERS
Route::get('/partners/politicas-de-privacidad', function(){ return view('web.politicasocios');})->name('web.socios.politicas');
Route::get('/partners', 'WebController@showAllPartners')->name('web.showallpartners');
Route::post('/partners', 'WebController@showAllPartners')->name('web.showallpartners.a');
Route::post('/partners/rating/{partner}', 'WebController@postStar')->name('partner.rating'); // RUTA PARA VALORAR UN PARTNER
Route::get('/partners/{partner}', 'WebController@showPartner')->name('web.showpartner'); // VER UN SOCIO - WEB
Route::post('/partners-contacto/{partner}', 'WebController@sendEmailContact')->name('web.send.email.socio');

//FETCH STATES
Route::post('/partners/api/fetch-states', 'WebController@fetchState')->name('partners.fetch.state');
Route::post('/partners/fetch-states/api', 'WebController@fetchStateAfter')->name('partners.fetch.state.a');

Route::get('/thankpartner', function(){return view('web.thankpartner');});

//OFICINAS
Route::get('/newjersey/{service?}', 'WebController@oficinasnj')->name('web.oficina.newjersey');
Route::get('/florida/{service?}', 'WebController@oficinasfl')->name('web.oficina.florida');
Route::get('/newyork/{service?}', 'WebController@oficinasny')->name('web.oficina.newyork');
//APOSTILLE SERVICES OFICINAS
// Route::get('/apostilla', function(){return view('web.office.apostille_layout');});
Route::post('/send-apostille', 'WebController@sendEmailApostille')->name('send.apostilla');

//SEND-EMAIL-OFICINA
Route::post('/sendmail-oficina', 'WebController@sendEmailOficina')->name('send.email.oficinas');


Route::get('/suscripcion', function () {    return view('web.x-contactenos');    })->name('web.suscripcion');
Route::get('/contactenos', function () {    return view('web.x-contactenos');    })->name('web.contactenos');
Route::get('/nosotros', function () {    return view('web.x-nosotros');    })->name('web.nosotros');
Route::get('/politicas-de-privacidad', function () {    return view('web.politicas');    })->name('web.politicas');

Route::get('/argentina', function () {    return view('web.consul.argentina');    })->name('web.argentina');
Route::get('/bolivia', function () {    return view('web.consul.bolivia');    })->name('web.bolivia');
Route::get('/colombia', function () {    return view('web.consul.colombia');    })->name('web.colombia');
Route::get('/costarica', function () {    return view('web.consul.costarica');    })->name('web.costarica');
Route::get('/ecuador', function () {    return view('web.consul.ecuador');    })->name('web.ecuador');
Route::get('/salvador', function () {    return view('web.consul.salvador');    })->name('web.salvador');
Route::get('/honduras', function () {    return view('web.consul.honduras');    })->name('web.honduras');
Route::get('/mexico', function () {    return view('web.consul.mexico');    })->name('web.mexico');
Route::get('/paraguay', function () {    return view('web.consul.paraguay');    })->name('web.paraguay');
Route::get('/peru', function () {    return view('web.consul.peru');    })->name('web.peru');
Route::get('/uruguay', function () {    return view('web.consul.uruguay');    })->name('web.uruguay');
Route::get('/venezuela', function () {    return view('web.consul.venezuela');    })->name('web.venezuela');


Route::get('getvisits', function () {
    //http://ip-api.com/json/172.58.230.131
    return response()->json(DB::table('visits')->select('created_at','ip')->orderBy('id','desc')->limit(100)->get());
});
Route::get('getleads', function () {
    return response()->json(DB::table('leads')->select('created_at','fname','tlf','email','message')->orderBy('id','desc')->limit(100)->get());
});



Route::get('testmail', 'WebController@testmail');
