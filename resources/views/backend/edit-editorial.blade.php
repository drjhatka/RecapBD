@extends('layouts.layout-backend')

@section('content')

<script src="/vendor/laravel-filemanager/js/lfm.js"></script>


@if (Session::has('edit_success'))
@php
    $msg= Session::get('edit_success');

@endphp
<script type="text/javascript">
    var msg="<?php echo $msg ?>";
    alert(msg);
</script>
@endif


<div class="col-md-10" >
    @php
        $editorial= Editorial::find($id);
    @endphp
    <div class="card mt-2" style="	background:#D1EEEE">
        <h5 class="card-header text-center text-danger">Edit News</h5>

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

            {!! Form::open(['route'=>'post.edit']) !!}


            {!! Form::label('news_title', 'Title', ['class'=>'col-md-2 text-danger form-label']) !!}


            {!! Form::text('news_title', $editorial->title,['class'=>'col-md-9 form-input-text']) !!}


<hr>
            {!! Form::label('news_short_desc', 'Short Desc (100 words max)',
                            ['class'=>'col-md-6 text-danger form-label']) !!}


            {!! Form::textarea('news_short_desc', $editorial->short_description,
                        ['class'=>'col-md-10 offset-1 text-danger form-input-textarea']) !!}

<hr>


            <div class="row mt-2 mb-2">
                    <div class="input-group">
                        <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Change News Display Image
                        </a>
                        </span>
                        <input id="thumbnail" class="form-control " type="text" value="{{ $editorial->image_path }}"
                                style="color:red; font-weight:bold;" name="filepath" readonly >
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;" src="{{ $editorial->image_path }}">
            </div>
            {!! Form::label('news_story', 'Story', ['class'=>'col-md-2 text-danger form-label']) !!}

            {!! Form::textarea('news_story', $editorial->content,
                        ['class'=>'col-md-10 offset-1 text-danger', 'id'=>'editor']) !!}
<hr>


            {!! Form::label('news_category', 'Select Category', ['class'=>'col-md-3 text-danger form-label']) !!}


            {!! Form::select('news_category',
                ['m'=>'Minority', 'f'=>'Free Speech','d'=>'Democracy', 'w'=>'Women & Children' ],'',
                        ['class'=>'col-md-5  form-input-text', 'id'=>'news_category']) !!}


                {!! Form::hidden('id', $editorial->id) !!}

            {!! Form::submit('Update', ['class'=>'col-md-2 offset-5 mt-4  btn btn-success']) !!}


            {!! Form::close() !!}

        </div>
    </div>

</div>



<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('editor',{


        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    //  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        //config.removeModules = 'UploadFileButton';
    // filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        /*
        filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : '/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/ckfinder/core/connector/aspx/connector.aspx?command=QuickUpload&type=Flash'
*/
    });

    </script>


    <script>
            $(document).ready(function() {
                    var $category= <?php echo json_encode($editorial->category->description); ?>;
                    console.log($category)
                    switch($category){
                        case('Women & Children'):
                        $('#news_category option[value="w"]').prop({defaultSelected: true});
                        break;

                        case('Minority'):
                        $('#news_category option[value="m"]').prop({defaultSelected: true});
                        break;

                        case('Free Speech'):
                        $('#news_category option[value="f"]').prop({defaultSelected: true});
                        break;

                        case('Democracy'):
                        $('#news_category option[value="d"]').prop({defaultSelected: true});
                        break;
                    }

                    $('#lfm').filemanager('image')


              });

    </script>

@endsection
