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

    public function scrollIndex(){
        error_log("scrollindex function called");

        $books = Audiobook::paginate(3);

        return LibraryIndexResource::collection(
            $books);
    }

    public function search($query){
        error_log("search is called");
        $books = Audiobook::where('title', 'LIKE', '%'.$query.'%')->paginate(3);

        // $books = Audiobook::where('title', 'LIKE', '%'."EVEN".'%')->paginate(3);



        return LibraryIndexResource::collection(
            $books);
    }

    public function delete($id){
        error_log("removing book ".$id);
        $book = Audiobook::find($id);
        $book->delete();
        // return response()
    }
}
