<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $videos = DB::table('video')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create(){
        return view('admin.videos.create');
    }

    public function store(Request $request){
        DB::table('video')->insert([
            'title' => $request->title,
            'link' => $request->link,
            'status' => $request->status,
            'description' => $request->description
        ]);
        $video = DB::table('video')->latest()->first();
        return redirect()->route('admin.edit.video', $video->id)->with('message', 'Se creo el video');
    }

    public function edit($id){
        $video = DB::table('video')->where('id', $id)->first();
        return view('admin.videos.create', compact('video'));
    }

    public function update(Request $request, $id){
        $video = DB::table('video')->where('id', $id)->update([
            'title' => $request->title,
            'link' => $request->link,
            'status' => $request->status,
            'description' => $request->description
        ]);
        return redirect()->route('admin.edit.video', $id)->with('message', 'Se actualizo el video');
    }
}
