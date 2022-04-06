<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Audiobook;

class LibraryController extends Controller
{
    public function index(){
        error_log("LibraryController index function called");
        return Audiobook::all();

    }
}
