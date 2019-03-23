<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use News;
use Comment;
use Session;

class CommentController extends Controller
{
    public function postComment(Request $request, $news_id){

        //validate data
        $rules= ['user_name'=>'required|min:4',
                'email'=>'required|email',
                'title'=>'required',
                'content'=>'required'];

        $validator = Validator::make($request->all(), $rules);

        $validator->validate();

        //if validation successful proceed

        $comment = new Comment();

        $comment->user_name= $request->user_name;
        $comment->email= $request->email;
        $comment->title= $request->title;
        $comment->content= $request->content;
        $comment->status= "Pending";

        $news = News::find($news_id)->first();
       // dd($news);
        $news->comments()->save($comment);

        Session::flash('comment_success', 'Comment added and will be published once approved by Moderators!');
        return redirect(route('show.frontend.news',$news_id));
    }
}
