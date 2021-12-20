<?php

namespace App\Http\Controllers;

use App\Consulate;
use App\Mail\SendLead;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index() {
        $indexPosts = Post::select('name', 'body', 'slug', 'created_at')
            ->where('status','PUBLICADO')
            ->latest()
            ->limit(6)
            ->get();
        return view('index',compact('indexPosts'));  
    }
    public function apostillas()
    {
        return view('web.apostillas');
    }
    public function showpost(Request $request)
    {
        $posts = Post::where('status','PUBLICADO')->orderBy('id','desc')->limit(3)->get();
        $post = Post::where('slug', $request->slug)->where('status','PUBLICADO')->first();

        if($post){
            return view('web.post.show',compact('post','posts'));
        }else{
            return redirect()->route('post.blog');
        }
    }
    public function showblog()
    {
        $posts = Post::where('status','PUBLICADO')->orderBy('id','desc')->paginate(12);
        return view('web.post.index',compact('posts'));
    }
    
    public function consulado(Request $request)
    {
        //$consuls = Consulate::orderBy('country')->get();
        $consul = Consulate::where('slug', $request->slug)->first();
        
        $posts = Post::where('status','PUBLICADO')->orderBy('id','desc')->limit(3)->get();

        if($consul){
            return view('web.consul.a-show',compact('consul','posts',));
        }else{
            return redirect()->route('consul.index');
        }
    }
    
    public function consulados()
    {
        $consuls = Consulate::orderBy('country')->get();
        return view('web.consul.all',compact('consuls'));
    }

}
