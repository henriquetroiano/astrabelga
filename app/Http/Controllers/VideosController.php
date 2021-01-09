<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideosController extends Controller
{
    public function admin_index(Request $request) {
        $videos = Video::orderBy('id', 'desc')->get();
        return view('site.admin.videos', compact('videos'));
    }

    public function admin_videos_uploader(Request $request) {
        $video = new Video;
        $video->title = $request->title;
        $video->iframe = $request->iframe;
        $video->save();
        
        return redirect()->route('videos_admin');
    }

    public function admin_videos_edit(Request $request) {
        $video = Video::find($request->id);

        if(isset($video)) {
            if(isset($request->title)) {
                $video->title = $request->title;
            }
            if(isset($request->iframe)) {
                $video->iframe = $request->iframe;
            }
            $video->save();
        }
        
        return redirect()->route('videos_admin');
    }

    public function admin_videos_delete(Request $request) {
        $video = Video::find($request->id);

        if(isset($video)) {
            $video->delete();
        }

        return redirect()->route('videos_admin');
    }

}
