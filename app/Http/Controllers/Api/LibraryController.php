<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Audiobook;
use App\Http\Resources\LibraryIndexResource;


class LibraryController extends Controller
{
    public function index(){
        error_log("LibraryController index function called");
        // return Audiobook::all();
        $books = Audiobook::paginate(10);


        return LibraryIndexResource::collection(
            $books);

    }
}
