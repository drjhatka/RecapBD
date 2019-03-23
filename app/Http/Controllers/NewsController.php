<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
use Category;
use LogicHelper;
use News;
use Tag;

class NewsController extends Controller
{

    //constructor
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.dashboard');
    }

    public function create()
    {
        return view('backend.add-news');
    }

    public function store(Request $request){
        //validate the data
            $validator = Validator::make($request->all(), [
                'news_title' => 'required|min:20|max:150',
                'news_short_desc' => 'required|max:250|min:10',
                'news_story' => 'required|max:2500|min:10',

            ]);

        //if validation fails laravel will automatically redirect to previous page
            $validator->validate();

        //check if at least one image exists!

        //validation successful proceed with saving the record
        //and also add record to linked/ junction tables
            $news = new News;
            $news->title= $request->news_title;
            $news->short_desc= $request->news_short_desc;
            $news->story= $request->news_story;
            $news->image_path=url('/').$request->filepath;

            if($request->has('is_featured')){
                $news->is_featured='Y';
            }
            else{
                $news->is_featured='N';
            }

        //check dropdown inputs
            $category = new Category();

            switch ($request->input('news_category')) {
                case 'w':
                    //$news->category_id= 1;
                    $category->description = 'Women & Children';
                    $category->save();
                    //add record to link table
                     $news->category()->associate($category);
                break;

                case 'm':
                    //$news->category_id= 2;
                    $category->description = 'Minority';
                    $category->save();
                    //add record to link table
                    $news->category()->associate($category);
                break;

                case 'f':
                    //$news->category_id= 3;
                    $category->description = 'Free Speech';
                    $category->save();
                    //add record to link table
                    $news->category()->associate($category);
                break;

                case 'd':
                   // $news->category_id= 4;
                    $category->description = 'Democracy';
                    $category->save();
                    //add record to link table
                    $news->category()->associate($category);
                break;
            }//end switch

            $news->posted_by= auth('admin')->user()->name;

            $news->save();

            //create Tags
            $tag_array= LogicHelper::getTagList();

            for ($i=0; $i<=count($tag_array) ; $i++) {
                if(($request->has('tag_'.($i+1)))){
                    $tag = new Tag();
                    //create new tag
                    $tag->description=$tag_array[$i];
                   // $tag->save();
                    $news->tags()->save($tag);
                }//end if
            }//end for

        Session::flash('add_success','News Added Successfully!');
        return redirect()->route('add.news');
    }//end method

    public function show(News $news)
    {
        return view('backend.view-news');
    }

    public function showIndvNews($id){
        return view('backend.view-individual-news')->with('id',$id);
    }

    public function showEditForm($id){
        return view('backend.edit-news')->with('id',$id);
    }

    public function edit(Request $request){
         //validate the data
         $validator = Validator::make($request->all(), [
            'news_title' => 'required|min:20|max:150',
            'news_short_desc' => 'required|max:250|min:10',
            'news_story' => 'required|max:2500|min:10',

        ]);
        //if validation fails laravel will automatically redirect to previous page
            $validator->validate();
        //check if at least one image exists!

        //validation successful proceed with saving the record
        //and also add record to linked/ junction tables
            $news = News::find($request->id);
            $news->title= $request->news_title;
            $news->short_desc= $request->news_title;
            $news->story= $request->news_short_desc;

        //check dropdown options

        switch ($request->input('news_category')) {
                case 'w':
                    //edit record to link table
                    $news->category()->update(['description'=>'Women & Children']);
                break;

                case 'm':
                    //edit record to link table
                    $news->category()->update(['description'=>'Minority']);
                break;

                case 'f':
                    //edit record to link table
                    $news->category()->update(['description'=>'Free Speech']);
                break;

                case 'd':
                //edit record to link table
                $news->category()->update(['description'=>'Democracy']);
                break;

            }
        //posted by
        $news->posted_by= auth('admin')->user()->name;
        $news->image_path= $request->filepath;

        if($request->has('is_featured')){
            $news->is_featured='Y';
        }
        else{
            $news->is_featured='N';
        }

            //delete previous relations first
                $news->tags()->delete();

            $news->save();
        //now insert new relation
            $tag_array= LogicHelper::getTagList();

            for ($i=0; $i<=count($tag_array) ; $i++) {
                if(($request->has('tag_'.($i+1)))){
                    //create new tag
                    $tag = new Tag();
                    $tag->description=$tag_array[$i];
                   // $tag->save();
                    $news->tags()->save($tag);
                }//end if
            }//end for


        Session::flash('edit_success','News Updated Successfully!');
        return redirect()->route('show.edit', $news->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function delete($news_id)
    {
        $news = News::find($news_id);

        //delete linked category record

        $news->category()->delete();
        $news->tags()->delete();

        //delete news
        $news->delete();

        Session::flash('delete_success','News Successfully Deleted!');

        return redirect()->route('add.editorial');

    }
}
