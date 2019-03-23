<?php

namespace App\Http\Controllers;

use News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use LogicHelper;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $news->short_desc= $request->news_title;
            $news->story= $request->news_short_desc;

        //check dropdown options
        switch ($request->input('news_category')) {
                case 'w':
                    $news->category= 1;
                //add record to link table
                    DB::table('news_categories')->insert([
                            'news_id'=>LogicHelper::getLastPK()+1, 'category_id'=>1]);
                break;

                case 'm':
                    $news->category= 2;
                //add record to link table
                        DB::table('news_categories')->insert(['news_id'=>LogicHelper::getLastPK()+1,
                                'category_id'=>2]);
                break;

                case 'f':
                        $news->category= 3;
                        DB::table('news_categories')->insert(['news_id'=>LogicHelper::getLastPK()+1,
                        'category_id'=>3]);

                break;

            }
        $news->input_by= auth('admin')->user()->name;

        //check if either follow up checkboxes are selected

        if($request->has('followup_parent')){
            $news->is_followup_parent='Y';
            // add record to linked table
            DB::insert('insert into news_followups (followup_parent_id, followup_child_id) values (?, ?)',
             [LogicHelper::getLastPK()+1, null]);

        }

        elseif($request->has('followup_child')){
             $news->is_followup_parent ='N';
             $parent_id= $request->followup_parent_id;

             DB::insert('insert into news_followups (followup_parent_id, followup_child_id) values (?, ?)',
             [$parent_id, LogicHelper::getLastPK()+1 ]);
            }
        $news->save();

        Session::flash('add_success','News Added Successfully!');
        return redirect()->route('add.news');
    }//end method

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('backend.view-news');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
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
            //dd($news);
            $news->title= $request->news_title;
            $news->short_desc= $request->news_title;
            $news->story= $request->news_short_desc;

        //check dropdown options
        switch ($request->input('news_category')) {
                case 'w':
                    $news->category= 1;
                //edit record to link table
                    DB::statement('update news_categories set category_id = '.$news->category.
                                                ' where news_categories.news_id = ?' ,[$request->id]);
                break;

                case 'm':
                    $news->category= 2;
                //edit record to link table
                    DB::statement('update news_categories set category_id = '.$news->category.
                    ' where news_categories.news_id =?',[$request->id]);
                break;

                case 'f':
                        $news->category= 3;
                        DB::statement('update news_categories set category_id = '.$news->category.
                        ' where news_categories.news_id = ?' ,[$request->id]);
                break;

            }
        $news->input_by= auth('admin')->user()->name;

        //check if either follow up checkboxes are selected

        if($request->has('followup_parent')){
            $news->is_followup_parent='Y';

            //delete previous record
            DB::statement('delete from news_followups where news_followups.followup_parent_id='.$request->id);

            // edit record to linked table
            DB::statement('update news_followups set followup_child_id='.DB::raw(null).
                                ' where news_followups.news_id = ?' ,[$request->id]);

        }

        elseif($request->has('followup_child')){

            //delete previous record
                DB::statement('delete from news_followups where news_followups.followup_parent_id='.$request->id);

             $news->is_followup_parent ='N';
             $parent_id= $request->followup_parent_id;

             DB::insert('insert into news_followups (followup_parent_id, followup_child_id) values (?, ?)',
             [$parent_id, $request->id ]);
        }
        $news->save();

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
    public function destroy(News $news)
    {
        //
    }
}
