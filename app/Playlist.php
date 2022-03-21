<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    public function audiobook()
    {
        return $this->hasOne(Audiobook::class, 'id', 'audiobook_id');
        // return $this->hasOne(AudioBook::class);
    }
}
