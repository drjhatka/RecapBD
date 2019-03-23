<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use News;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function showNews($id){
        return view('frontend.show-news')->with('id', $id);
    }
    public static function showLatestNews(){
        $news = News::orderBy('created_at','desc')->limit(3)->get();



    }

    public static function getNewsImages( $news_id){
        //dd($news_id);
        $news = News::find($news_id);

        $news_story= $news->story;

        $dom  = new \DOMDocument();
        $dom->loadHTML($news_story);

        $dom->preserveWhiteSpace = false;

        $images = [];
        foreach ($dom->getElementsByTagName('img') as $image) {
           // $images[] = $image->getAttribute('src');
            $images[] = $image->getAttribute('src');

        }//end for
        return $images;
    }//end method

    public static function getFeaturedNewsList(){
        $news = News::where('is_featured', 'Y')->orderBy('id', 'desc')->limit(5)->get();
        return $news;
    }
    public static function getLatestNewsList(){
        //get all news that are not currently featured
        $news= News::where('is_featured', 'N')->orderBy('id', 'desc')->limit(6)->get();
        return $news;
    }

    public static function getCategoryNewsList($category){
        $all_news = News::all();
        $latest_news = self::getLatestNewsList();

        $category_news = array();

        foreach ($all_news as $news) {
            //dd(!$news->id);
            //dd(in_array($news->id, self::latestNewsIDList()));
            if(strcmp($news->category->description, $category)==0
                        && (in_array($news->id, self::latestNewsIDList())==false)
                            && strcmp($news->is_featured, 'N')==0){
                    array_push($category_news, $news);
            }//end if
        }

        rsort($category_news);
        return $category_news;
    }//end method

    public static function latestNewsIDList(){
        $id_list = array();
        $latest_news= self::getLatestNewsList();

        foreach ($latest_news as $news) {
            array_push($id_list, $news->id);
        }

       //dd($id_list);
        return $id_list;
    }


}//end class
