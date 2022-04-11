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
        $books = Audiobook::paginate(5);


        return LibraryIndexResource::collection(
            $books);

    }

    public function scrollIndex($from,$to){
        error_log("scrollindex function called");
        // $booksChunk = Audiobook::findMany([2, 3]);
        // error_log("adfadsf".$booksChunk);
        
        // error_log("werkt dit");
        $books = Audiobook::paginate(3);

        return LibraryIndexResource::collection(
            $books);
    }
}
