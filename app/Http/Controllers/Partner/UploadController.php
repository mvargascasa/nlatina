<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Illuminate\Support\Facades\Storage;
use App\Partner;
use Illuminate\Support\Facades\Auth;


class UploadController extends Controller
{
    public function formupload(){
        return view('admin.partner.upload-video');
    }

    public function uploadLargeFiles(Request $request, $id) {

        $partner = Partner::where('id', $id)->first();

        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
    
        if (!$receiver->isUploaded()) {
            // file not uploaded
        }
    
        $fileReceived = $receiver->receive(); // receive file

        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded

            if(Storage::exists($partner->url_video)) Storage::delete($partner->url_video);

            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
    
            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('videos', $file, $fileName);
    
            // delete chunked file
            unlink($file->getPathname());

            $partner->url_video = $path;
            $partner->save();

            return [
                'path' => asset('storage/' . $path),
                'filename' => $fileName,
            ];

        }
    
        // otherwise return percentage information
        $handler = $fileReceived->handler();
        
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }

    public function deleteFileVideo(){
        $partner = Partner::where('id', Auth::user()->id)->first();
        if(Storage::exists($partner->url_video) || $partner->url_video != null){
            Storage::delete($partner->url_video);
            $partner->url_video = null;
            $partner->save();
        }
        return redirect()->route('partner.upload.form')->with('delete-file', 'Se elimino el video');
    }
}
