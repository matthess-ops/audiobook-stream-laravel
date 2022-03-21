<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use App\User;

class TeststuffController extends Controller
{
    public function testRelations(){
        $userOne = User::find(1);
        $userOnePlaylists = User::find(1)->playlists;
        foreach ($userOnePlaylists as $play) {
            echo $play->audiobook_id ,"|",$play->audiobook->id;
            echo "<br>";
        }

        // $playlistOne = Playlist::find(1);
        // echo $playlistOne->audiobook;


    }
}
