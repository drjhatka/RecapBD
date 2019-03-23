<?php

namespace App\Http\Controllers;
use Validator;
use Editorial;
use Category;
use Illuminate\Http\Request;
use Session;

class EditorialController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('backend.add-editorial');
    }

    public function save(Request $request){
                //validate the data
                $validator = Validator::make($request->all(), [
                    'title' => 'required|min:20|max:150',
                    'short_desc' => 'required|max:190|min:10',
                    'content' => 'required|max:2500|min:10',

                ]);

            //if validation fails laravel will automatically redirect to previous page
                $validator->validate();
            //check if at least one image exists!

            //validation successful proceed with saving the record
            //and also add record to linked/ junction tables
                $editorial = new Editorial();
                $editorial->title= $request->title;
                $editorial->short_description= $request->short_desc;
                $editorial->content= $request->content;
        //check dropdown inputs
                $category = new Category();

                switch ($request->input('category')) {
                    case 'w':
                        //$editorial->category_id= 1;
                        $category->description = 'Women & Children';
                        $category->save();
                        //add record to link table
                         $editorial->category()->associate($category);
                    break;

                    case 'm':
                       // $editorial->category_id= 2;
                        $category->description = 'Minority';
                        $category->save();
                        //add record to link table
                        $editorial->category()->associate($category);
                    break;

                    case 'f':
                        //$editorial->category_id= 3;
                        $category->description = 'Free Speech';
                        $category->save();
                        //add record to link table
                        $editorial->category()->associate($category);
                    break;

                    case 'd':
                        //$editorial->category_id= 4;
                        $category->description = 'Democracy';
                        $category->save();
                        //add record to link table
                        $editorial->category()->associate($category);
                    break;
                }//end switch

                $editorial->image_path= url('/').$request->filepath;

                $editorial->posted_by= auth('admin')->user()->name;

                $editorial->save();

                Session::flash('add_success','Editorial Created Successfully!');
                return redirect()->route('add.editorial');

    }//end method

    public function showEditForm($id){
        return view('backend.edit-editorial')->with('id',$id);
    }

    public function viewAllEditorials(){
        return view('backend.view-editorials');
    }
}
