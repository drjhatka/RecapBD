@extends('layouts.layout-frontend')

@section('content')

<div class="col-md-12">
    @php
        $news = News::find($id);
    @endphp
    <div class="row">
        <div class="col-md-12">
           <h4>
               {{ $news->title }} <br> <hr>
            </h4>
        </div>

        <div class="col-md-12 bg-dark">
             <img class="img-fluid img-bordered" style="" src="{{ $news->image_path }}" alt="">
        </div>

        <div class="col-md-3">
            <hr>
            Created: {{ $news->created_at }}
        </div>
        <div class="col-md-3">
                <hr>
                Updated: {{ $news->updated_at }}
        </div>
        <div class="col-md-3">
                <hr>
                Posted By: {{ $news->posted_by }}
        </div>

        <div class="col-md-12 mt-3">
             @php
                 echo $news->story;
             @endphp
        </div>

        <div class="col-md-12 mt-3">
            <hr>
               Category : {{ $news->category->description }}
        </div>

        <div class="col-md-12">
                <hr>
                    <h4>TAGS LIST</h4>
            </div>
        <div class="col-md-12">
            <hr>
            <h4>RELATED NEWS / MORE NEWS FROM THIS CATEGORY</h4>
        </div>
        <div class="col-md-12">
            <hr>
                <h4>COMMENTS</h4>
        </div>
    </div>
    @include('partials.comments')
</div>
@endsection
