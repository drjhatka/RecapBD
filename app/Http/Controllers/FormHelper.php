<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Form;

class FormHelper extends Controller
{

    public static $dropdown_class=          'form-control col-md-4 offset-4 text-bold ';
    public static $dropdown_label_style=    'color:red; font-weight:bold; text-align:center ';
    public static $header_class=            'class="card-header bg-info text-center text-white text-bold"';
    public static $label_style =            'style="background:#E0EEEE; border-radius:10px;"';
    public static $label_row_class =        'class="row mt-2 mb-2 pt-2 pb-2"';



    public static function createForm($form_title, $input_name_array, $input_label_array){
                    //create wrapper div
            $html= '<div class="col-md-10">';
                    //create card background
            $html .=    '<div class="" style="background: #d1eeee;">';
                    //create card header
            $html .=      '<div class="col-md-12 card">';

            $html .=       '<div class="card-header bg-success text-center text-white">'.$form_title.'</div>';


            $html .='<div class="col-md-12 card-body ">';


            for ($i=0; $i <count($input_name_array) ; $i++) {
                $html .=FormHelper::createTextInputBlock($input_name_array[$i],$input_label_array[$i]);

            }

        //end divs
            $html .='</div></div></div>';

            //return output
            return $html;

    }

    public static function createFormHeader($title){
        $html ='<div '.self::$header_class.'>'.$title.'</div>';
        return $html;
    }

//one liner text input
    public static function createTextInputBlock($input_name,$label_text, $label_size, $input_size){

        $html ='<div '.self::$label_row_class.' '.self::$label_style.'>'.
                    '<div class="col-md-'.$label_size.'">'.
                            Form::label($input_name,$label_text,["style"=>'color:red; font-weight:bold;']).'</div>';
        $html .='<div class="col-md-'.$input_size.'">'.Form::text($input_name,'',["class"=>'form-control']).'</div></div>';

        return $html;
    }
//multi line text input
    public static function createTextAreaBlock($input_name, $label_text, $rows, $id=null){
        $html ='<div '.self::$label_row_class.' '.self::$label_style.'>'.'<div class="col-md-12 text-center">'.
                            Form::label($input_name,$label_text,
                            ["style"=>'color:red; font-weight:bold;']).'</div>';

        $html .='<div class="col-md-12">'.Form::textarea($input_name,'',
                    ["class"=>'form-control','rows'=>$rows,'id'=>$id]).
                    '</div></div>';

        return $html;
    }

// html select element
    public static function createDropdownBlock($dropdown_name, $label_text, $option_array, $is_selected){
        $html = '<div '.self::$label_row_class.' '.self::$label_style.'>';
        $html .= Form::label($dropdown_name,$label_text,["class"=>"col-md-12","style"=>self::$dropdown_label_style]);
        $html .= Form::select($dropdown_name,$option_array,false, ['class'=>self::$dropdown_class, 'style'=>'font-weight:bold; color:blue; ']);
        $html .='</div>';

        return $html;
    }

    public static function createCheckboxBlock($input_name_array, $label_text_array ){

        $html    =  '<div class="row mt-2 pt-2" '.self::$label_style.'>';
        $html .='<div class="col-md-12 text-center text-danger" style="font-weight:bold;">Select Tags</div>';
        for ($i=0; $i <count($input_name_array) ; $i++) {
            $html   .= '<div class="col-md-3">'.Form::label( $input_name_array[$i],$label_text_array[$i],['style'=>'color:blue; font-weight:bold; text-align:right;']).'</div>';
            $html   .= '<div class="col-md-1">'.Form::checkbox($input_name_array[$i], '',false,['class'=>'mt-2']).'</div>';

        }
        $html   .= '</div>';

        return $html;
    }

    public static function createSubmitBlock( $value){
        $html ='<div class="row mt-4 pt-2">'.Form::submit( $value,['class'=>' btn btn-primary col-md-4 offset-4'] ).'</div>';
        return $html;
    }
}
