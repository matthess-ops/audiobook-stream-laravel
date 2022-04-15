<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Playlist;
use App\Audiobook;
// use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


class AudioPlayerController extends Controller
{
    //adds the new audiobook to playlist or if already in
    //playlist set is_last_played is true.
    public function setToListening(Request $request){
        error_log("request rechecived");
        // error_log(print_r($request->all(),true));
        $bookId = $request->bookId;
        $userId = $request->userId;
        // $user = User::find($userId);
        $userPlays = User::find($userId)->playlists;
        error_log("plays found ".count($userPlays));
        error_log("user id ".auth('sanctum')->user()->id);

        $audioBookFound = $userPlays->where('audiobook_id', $bookId);
        error_log("audiobook found ".$audioBookFound->isEmpty());

        if($audioBookFound->isEmpty()){
            //book is not present in playlist
            // $table->string('user_id');
            // $table->string('audiobook_id');
            // $table->boolean('is_last_played');
            // $table->integer('current_time');
            $play = new Playlist();
            $play->user_id = auth('sanctum')->user()->id;
            $play->audiobook_id = $bookId;
            $play->is_last_played = true;
            $play->current_time = 0;
            $play->save();
            return response($play->id);

            //add new play to db
            // remove is_last_played from other bookd
        }else{
            //book is present in playlist
            //1: set all plays is_last_player to false
            //2: set book presen is_last_played to true
            error_log("set book to not played");
            foreach($userPlays as $play) {
                $play->is_last_played = false;
                $play->save();
                error_log("thes oidd ".$play->id."  ".$play->is_last_played);
            }
            error_log(gettype($audioBookFound));
            error_log($audioBookFound->first()->is_last_played);
            $audioBookFound->first()->is_last_played = true;
            $audioBookFound->first()->save();
            return response($audioBookFound->first()->id);


        }
        // foreach ($userPlays  as $play) {
        //     error_log($play->audiobook_id);
        // }

    }


    public function read($id){
        error_log("read function called");
        error_log("book to player id = ".$id);
        $playData = Playlist::find($id);
        $bookData = $playData->audiobook;
        return response()->json([
            'playData' => $playData ,
            'bookData' => $bookData,
        ]);
        // $userId = auth('sanctum')->user()->id;
        // $playData =
        // error_log($userId);

    }

    public function stream()
    {
        Storage::disk('local')->put('tttt.txt', 'Contents');


        error_log("trying to get audio");

        $file = Storage::disk('local')->get("Kalimba.mp3");
        error_log("A");
        $filesize = Storage::disk('local')->size("Kalimba.mp3");
        error_log("B ".$filesize);


        $response = new Response($file, 200);
        error_log("C");

        $response->header('Content-Type', 'audio/mpeg');
        error_log("D");

        $response->header('Content-Length', $filesize);
        error_log("E");

        $response->header('Accept-Ranges', 'bytes');
        error_log("F");

        $response->header('Content-Range', 'bytes 0-'.$filesize.'/'.$filesize);
        error_log("G");

        return $response;
    }

    public function updatePlayTime(Request $request){
        error_log("update play time called");
        error_log(print_r($request->all(),true));
        // $playListId = $request->playListId;
        // $newCurrentTime = $request->newCurrentTime;
        // error_log("playlistid ".$playListId);
        // error_log("newcurrent time= ".$newCurrentTime );
    }
}
