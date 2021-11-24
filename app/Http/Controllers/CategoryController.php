<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin/category/index',compact('categories'));
    }

    public function create()
    {
        return view('admin/category.edit');
    }

    public function store(Request $request)
    {
        $slug = Str::of($request->name) ->trim()->slug()->limit(70,'');
        $request->merge(['slug' => $slug]);
        $request->merge(['user_id' => Auth::id()]);
        $category = Category::create($request->all());

        if ($request->hasFile('imgcatup')) {
            if ($request->file('imgcatup')->isValid()) {
                $validate = $request->file('imgcatup')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgcatup'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/';
                        $nameFile = "IMG_$category->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $img->fit(900, 600 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i900_".$nameFile, 40);

                        $img->fit(600,320 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i600_".$nameFile, 40);

                        $img->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i300_".$nameFile, 40);

                        $category->update(['imgdir'  => $nameFile]);
                    }
                }
            }
        }


        return redirect()->route('category.edit',compact('category'))->with('status','Categoria Actualizada');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        if ($request->hasFile('imgcatup')) {
            if ($request->file('imgcatup')->isValid()) {
                $validate = $request->file('imgcatup')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgcatup'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/';
                        $nameFile = "IMG_$category->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $img->fit(900, 600 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i900_".$nameFile, 40);

                        $img->fit(600,320 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i600_".$nameFile, 40);

                        $img->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                        $img->save($folder."i300_".$nameFile, 40);

                        $category->update(['imgdir'  => $nameFile]);
                    }
                }
            }
        }

        return redirect()->route('category.edit',compact('category'))->with('status','Categoria Actualizada');
    }

    public function destroy(Category $category)
    {
        //
    }
}
