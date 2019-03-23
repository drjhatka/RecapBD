@extends('layouts.layout-backend')

@section('content')


@if (Session::has('add_success'))
@php
    $msg= Session::get('add_success');

@endphp
<script type="text/javascript">
    var msg="<?php echo $msg ?>";
    alert(msg);
</script>
@endif

<div class="col-md-10" >
    <div class="card mt-2" style="background: #d1eeee;">
        <h5 class="card-header text-center text-danger">Add News</h5>

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


            {!! Form::label('news_title', 'Title', ['class'=>'col-md-2 text-danger form-label']) !!}


            {!! Form::text('news_title', '',['class'=>'col-md-9 form-input-text']) !!}


<hr>
            {!! Form::label('news_short_desc', 'Short Desc (100 words max)',
                            ['class'=>'col-md-6 text-danger form-label']) !!}


            {!! Form::textarea('news_short_desc', '',
                        ['class'=>'col-md-10 offset-1 text-danger form-input-textarea']) !!}

<hr>


            {!! Form::label('news_story', 'Story', ['class'=>'col-md-2 text-danger form-label']) !!}

            {!! Form::textarea('news_story', '',
                        ['class'=>'col-md-10 offset-1 text-danger', 'id'=>'editor']) !!}
<hr>


            {!! Form::label('news_category', 'Select Category', ['class'=>'col-md-3 text-danger form-label']) !!}

            {!! Form::select('news_category',
                ['w'=>'women & children', 'm'=>'minority', 'f'=>'free speech'], true,['class'=>'col-md-5 form-input-text']) !!}



            <div class="row mt-4 bg-light">
                {!! Form::label('followup_parent', 'Is Follow Up Base News?', ['class'=>'col-md-3  offset-1 text-success form-label']) !!}
                {!! Form::checkbox('followup_parent', null, false, ['class'=>'col-md-2  mt-2',
                'id'=>'followup_parent']) !!}

                {!! Form::label('followup_child', 'Is Follow Up Child News?', ['class'=>'col-md-3 text-success form-label']) !!}
                {!! Form::checkbox('followup_child', null, false, ['class'=>'col-md-2 mt-2',
                'id'=>'followup_child']) !!}


            <div class="col-md-12" id="parent_id">
                <div class="row">
                    {!! Form::label('followup_parent_id', 'Followup Base News ID', ['class'=>'col-md-5 form-text-input  offset-1 text-success form-label']) !!}
                    {!! Form::text('followup_parent_id', '', ['class'=>'col-md-3']) !!}

                </div>

            </div>

            </div>


            {!! Form::submit('Save', ['class'=>'col-md-2 offset-3 mt-4  btn btn-success']) !!}


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
            $(function() {
                $('#parent_id').hide();
                $('#followup_parent').change(function(){
                    if(this.checked){
                        //disable the child checkbox
                        $('#followup_child').prop('checked', false);
                        $('#parent_id').fadeOut(1000);

                    }

                })

                $('#followup_child').change(function(){
                    if(this.checked){
                        //disable the child checkbox
                        $('#followup_parent').prop('checked', false);
                        $('#parent_id').fadeIn(1000);
                    }

                })


              });

    </script>

@endsection
