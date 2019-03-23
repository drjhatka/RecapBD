@extends('layouts.layout-backend')
@section('content')

<script src="/vendor/laravel-filemanager/js/lfm.js"></script>


<div class="col-md-10 bg-light mt-2" >
        @php
            echo FormHelper::createFormHeader('Add News');
        @endphp

        @if (Session::has('add_success'))
            @php
                $msg= Session::get('add_success');
            @endphp
                <div class="col-md-12  mt-2 alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $msg }}</strong>
                </div>
        @endif

        @if (count($errors)!=0)
            <div class="row mt-2">
                    <div class="col-md-12 text-center ">
                        <h5 class="card-header text-danger">The Following errors occured</h5>
                    </div>
            </div>
        @endif

        @if (!is_null(LogicHelper::generateErrorDiv($errors)))
            @foreach (LogicHelper::generateErrorDiv($errors) as $error)
                @php
                    echo($error);
                @endphp
            @endforeach
        @endif

        <div class="card-body">
            {!! Form::open(['route'=>'post.news']) !!}
                @php
                    $tag_list = LogicHelper::getTagList();
                    $tag_input_list= array();
                    $dropdown_option_array= ['w'=>'Women & Children','m'=>'Minority','f'=>'Free Speech', 'd'=>'Democracy'];

                        for($i=0; $i<count($tag_list); $i++){
                            array_push( $tag_input_list,('tag_'.($i+1)));
                        }
                    echo FormHelper::createTextInputBlock('news_title', 'News Title', 2, 10);
                    echo FormHelper::createTextAreaBlock('news_short_desc', 'Short Description', 3);
                @endphp

                <div class="row">
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose News Display Image
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control " type="text" style="color:red; font-weight:bold;" name="filepath" readonly >
                      </div>
                      <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>


                @php
                    echo FormHelper::createTextAreaBlock('news_story','Story', 5,'editor');
                    echo FormHelper::createDropdownBlock('news_category','Select Category',$dropdown_option_array,false);
                    echo FormHelper::createCheckboxBlock($tag_input_list, $tag_list);
                @endphp

                <div class="row bg-info mt-2">
                    {!! Form::label('is_featured', 'Is Featured News?', ['class'=>'col-md-3 offset-3', 'style'=>'color:white; font-weight:bold; text-align:right;']) !!}

                    {!! Form::checkbox('is_featured', '', false, ['class'=>'col-md-1 mt-2']) !!}
                </div>

                @php
                    echo FormHelper::createSubmitBlock('Add News');
                @endphp


            {!! Form::close() !!}
        </div> <!--end card body -->
    </div> <!--end main container -->


    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor',{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/uploader/upload.php'
        });
    </script>

    <script>
        $(document ).ready(function() {
            // Handler for .ready() called.
            $('#lfm').filemanager('image');

          });
    </script>
@endsection


