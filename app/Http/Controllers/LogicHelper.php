<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Admin;
use Hash;
use News;
use DB;
use Session;

class LogicHelper extends Controller
{
    //Temporary Route Functions ----------->
    public function addUser(Request $request){
        $admin = new Admin();

        $admin->admin_id= $request->user_id;
        $admin->created_at= $request->created_at;
        $admin->password= Hash::make($request->password);
        $admin->name= $request->user_name;
        $admin->status_id= 1;

        $admin->save();
        return redirect()->to(route('add.user'));
    }//end function

    public function addTag(){
        return view('backend.temp.add-tags');
    }
    public function postTag(Request $request){
        //validate
        foreach ($request->except('_token') as $value) {
            if($value==null){
                return redirect()->back();
            }
            else{
                if(!is_null($value)){
                   // dd($value);
                    DB::insert('insert into tags_detail (tag_detail) values (?)', [$value]);
                }
            }
        }//end foreach
    }//end method
    //Temporary Route Functions !----------->



    //General Purpose Static Helper Functions ---->
    public static function generateErrorDiv($errors){
        $error_box= array();

        if(!is_null($errors)){
            foreach ($errors->getMessages() as $key=>$msg) {
                switch ($key) {
                    case 'title':
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

                    case 'short_desc':
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

                case 'content':
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
          return $error_box;
        }//end if
    }//end method

    public static function getLastPK(){
        $news= News::orderBy('id','desc')->limit(1)->first();
        if(is_null($news)){
            return 0;
        }
        else{
            return $news->id;
        }
    }//end method
    //General Purpose Static Helper Functions !---->

    public static function getTagList(){
        $tag_array= array();
        $tags= DB::select('select * from tags_detail');

        foreach ($tags as $tag) {
            array_push($tag_array,$tag->tag_detail);

        }//end foreach
        sort($tag_array);
        return $tag_array;
    }//end method

    public static function loadTags($news){
        $tag_array= array();
        $tags = $news->tags;

        foreach ($tags as $key => $value) {
            array_push($tag_array, $value->description);
        }
        sort($tag_array);
        return $tag_array;
    }

    public static function getSelectArray(){
        $option_array = ['w'=>'Women & Children',
                        'm'=>'Minority','f'=>'Free Speech','d'=>'Democracy',];
        return $option_array;
    }//end method

    public static function addSuccess($flash_msg){
        if(Session::has($flash_msg)){
            $msg=Session::get($flash_msg);
            return '<script type="text/javascript">'.
                ' var msg="<?php echo $msg ?>; "'.
                ' alert(msg); '.
                '</script> ';
        }
    }
}//end class
