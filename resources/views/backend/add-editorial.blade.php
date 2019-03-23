@extends('layouts.layout-backend')


@section('content')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>

<div class="col-md-10 mt-2 pb-2">


    {!! Form::open(['route'=>'save.editorial']) !!}

    @php
        echo FormHelper::createFormHeader('Create Editorial');

    @endphp

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

    @php
        echo FormHelper::createTextInputBlock('title','Title', 2,10);
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

    @php
        echo FormHelper::createTextAreaBlock('short_desc','Short Description', 3,null);
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
        echo FormHelper::createTextAreaBlock('content','Content', 6,'editor');
        echo FormHelper::createDropdownBlock('category','Select Category', LogicHelper::getSelectArray(),false);
        echo FormHelper::createSubmitBlock('Create Editorial');
    @endphp

    {!! Form::close() !!}

</div>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('editor',{
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    });
</script>

<script>
        $(document ).ready(function() {
            // Handler for .ready() called.
            $('#lfm').filemanager('image');

          });
</script>

@endsection
