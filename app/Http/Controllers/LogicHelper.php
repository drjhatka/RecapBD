<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Admin;
use Hash;
use News;

class LogicHelper extends Controller
{
    public function addUser(Request $request){
        $admin = new Admin();

        $admin->admin_id= $request->user_id;
        $admin->created_at= $request->created_at;
        $admin->password= Hash::make($request->password);
        $admin->name= $request->user_name;
        $admin->status_id= 1;

        $admin->save();

        return redirect()->to(route('add.user'));
    }

    public static function generateErrorDiv($errors){

        $error_box= array();

        if(!is_null($errors)){
            foreach ($errors->getMessages() as $key=>$msg) {
                # code...
                //dd($msg[0]);
                switch ($key) {
                    case 'news_title':
                        $div = '<div class="col-md-12" >'.
                                    '<div class="col-md-12 bg-light text-center" >'.
                                        '<span class="help-block" style="color:blue;">'.
                                        '<i class="fa fa-warning text-danger"></i>'.
                                        $msg[0].
                                        '</span>'.
                                    '</div>'.
                                    '<hr>'.
                                '</div>';
                        array_push($error_box, $div);
                    break;

                    case 'news_short_desc':
                        $div2 = '<div class="col-md-12" >'.
                                    '<div class="col-md-12 bg-light text-center" >'.
                                        '<span class="help-block" style="color:blue;">'.
                                        '<i class="fa fa-warning text-danger"></i>'.
                                            $msg[0].
                                        '</span>'.
                                    '</div>'.
                            '<hr>'.
                        '</div>';
                    array_push($error_box, $div2);
                    break;

                    case 'news_story':
                    $div3 = '<div class="col-md-12" >'.
                                '<div class="col-md-12 bg-light text-center" >'.
                                        '<span class="help-block" style="color:blue;">'.
                                        '<i class="fa fa-warning text-danger"></i>'.
                                        $msg[0].
                                        '</span>'.
                                    '</div>'.
                                '<hr>'.
                            '</div>';
                    array_push($error_box, $div3);
                    break;
                }//end switch
            }//end for
            //dd($error_box);
          return $error_box;
        }//end if


    }//end method


    public static function getLastPK(){
        $news= News::orderBy('id','desc')->limit(1)->first();
        //dd();
        if(is_null($news)){
            return 0;

        }
        else{
            return $news->id;
        }

    }
}
