<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\HtmlDomParser;
use Illuminate\Support\Facades\Storage;
use App\Audiobook;


class GoodreadsController extends Controller
{
    public function parser($link){
        error_log("downloading ".$link);
        $dom = \voku\helper\HtmlDomParser::file_get_html($link);
        $title = $dom->find('#bookTitle',0)->innertext;
        $authorName =$dom->find('.authorName',0)->find('span',0)->innertext;
        $rating = $dom->find('[itemprop="ratingValue"]',0)->innertext;
        $descriptionShort = $dom->find('#description',0)->find('span',0)->innertext;
        $descriptionBig = $dom->find('#description')->find('span',1)->innertext;
        $genre = $dom->find('.bookPageGenreLink',0)->innertext;


        $coverImageUrl = $dom->find('#coverImage',0)->src;
        $contents = file_get_contents($coverImageUrl);
        $name ="public/cover_images/". substr($coverImageUrl, strrpos($coverImageUrl, '/') + 1);
        Storage::put($name, $contents);
        $coverImagePath = $name;

         $bookSeries = null;
        try {
            $bookSeries = trim($dom->find('#bookSeries',0)->find('a',0)->innertext);
        } catch (\Exception $e) {
            error_log("#bookSeries node not found");
        }

        $newBook = new Audiobook();
        $newBook->author = $authorName;
        $newBook->title = $title;
        $newBook->genre = $genre;
        $newBook->rating = $rating;

        $newBook->book_series = $bookSeries;
        $newBook->description_short = $descriptionShort;
        $newBook->description_large = $descriptionBig;
        $newBook->cover_image = $coverImagePath;
        $newBook->audio_file = 'audio_files/test_audio';

        $newBook->save();

    }
}
