<?php

namespace App\Http\Controllers;

use App\Category;
use App\Consulate;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin/post/index',compact('posts'));
    }

    public function create()
    {
        $consulates = Consulate::all()->pluck('country','id')->toArray();
        $categories = Category::all()->pluck('name','id')->toArray();
        return view('admin/post/edit',compact('categories','consulates'));
    }

    public function store(Request $request)
    {
        $slug = Str::of($request->name) ->trim()->slug()->limit(70,'').'-'.rand(10000, 99999);
        $request->merge(['slug' => $slug]);
        $request->merge(['user_id' => Auth::id()]);
        $post = Post::create($request->all());

        if ($request->hasFile('imgpostup')) {
            if ($request->file('imgpostup')->isValid()) {
                $validate = $request->file('imgpostup')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgpostup'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/';
                        $nameFile = "IMG_$post->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $img->fit(900, 600 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i900_".$nameFile, 40);

                        $img->fit(600,320 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i600_".$nameFile, 40);

                        $img->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i300_".$nameFile, 40);

                        $post->update(['imgdir'  => $nameFile]);
                    }
                }
            }
        }

        if ($request->hasFile('imgsmallup')) {
            if ($request->file('imgsmallup')->isValid()) {
                $validate = $request->file('imgsmallup')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgsmallup'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/';
                        $nameFile = "IMG_$post->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $img->fit(900, 600 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i900_".$nameFile, 40);

                        $img->fit(600,320 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i600_".$nameFile, 40);

                        $img->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i300_".$nameFile, 40);

                        $post->update(['imgsmall'  => $nameFile]);
                    }
                }
            }
        }

        return redirect()->route('post.edit',compact('post'))->with('status','Publicación Creada');
    }

    public function edit(Post $post)
    {
        $consulates = Consulate::all()->pluck('country','id')->toArray();
        $categories = Category::all()->pluck('name','id')->toArray();
        return view('admin.post.edit',compact('post','categories','consulates'));
    }

    public function update(Request $request, Post $post)
    {
        $post->fill($request->all());
        $post->save();

        if ($request->hasFile('imgpostup')) {
            if ($request->file('imgpostup')->isValid()) {
                $validate = $request->file('imgpostup')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgpostup'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/';
                        $nameFile = "IMG_$post->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $img->fit(900, 600 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i900_".$nameFile, 40);

                        $img->fit(600,320 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i600_".$nameFile, 40);

                        $img->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i300_".$nameFile, 40);

                        $post->update(['imgdir'  => $nameFile]);
                    }
                }
            }
        }


        if ($request->hasFile('imgsmallup')) {
            if ($request->file('imgsmallup')->isValid()) {
                $validate = $request->file('imgsmallup')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgsmallup'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/';
                        $nameFile = "IMG_$post->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $img->fit(900, 600 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i900_".$nameFile, 40);

                        $img->fit(600,320 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i600_".$nameFile, 40);

                        $img->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i300_".$nameFile, 40);

                        $post->update(['imgsmall'  => $nameFile]);
                    }
                }
            }
        }

        return redirect()->route('post.edit',compact('post'))->with('status','Publiación Actualizada');
    }

    public function destroy(Post $post)
    {
        //
    }
}
