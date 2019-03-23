<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use News;
use Session;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }


    public function index(){
        return view('backend.dashboard');
    }

    public function addNewsForm(){
        return view('backend.add-news');
    }

    public function search(Request $request){
        $news= News::all();

        if(count($news) !=0){
            foreach ($news as $news) {
                    $title = $news->title;
                    $story = $news->story;
                //check if the keyword exists in either title or in content
                    $result_title=stripos($title,$request->search);
                    $result_story=stripos($story,$request->search);

                if($result_title !==false || $result_story !==false){
                    return redirect()->route('search.result')->with('news',$news);
                }
                else{
                    //dd($news->story);
                    dd('not found');

                }

            }//end for each
        }//end if
        else{
            Session::flash('search_empty', 'No News Found');
            return redirect()->route('show.news');
        }
    }

    public function showSearchResult(){
        return view('backend.search-result');
    }
}
