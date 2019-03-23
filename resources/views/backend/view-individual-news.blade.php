@extends('layouts.layout-backend')

@section('content')

    <div class="col-md-10 mt-2">
        @php
            $news= News::find($id);
        @endphp
            <div class="col-md-12 card">
                <div class="row">
                    <div class="col-md-12 card-header" style="color:orangered; font-weight:bold;">
                        <span class="badge badge-success" style="padding:10px;">
                                <a href="{{ route('show.news') }}">
                                    <i class=" fa fa-hand-o-left fa-lg" style="color:white;"> Back</i>
                                </a>
                        </span>

                    </div>
                    <div class="col-md-12 card-header" style="color:orangered;">
                      <h4>
                          {{ $news->title }}
                        </h4>
                    </div>

                    <div class="col-md-12 card-body">
                        <div class="row">
                            <div class="col-md-10 offset-1" style="font-weight: bold;
                                        font-size:13px; border-bottom:1px solid lightblue;
                                        padding-bottom:10px; margin-bottom:10px;">
                                {{ $news->short_desc }}
                            </div>
                        </div>

                        <div class="col-md-12 mb-2" style="font-weight: bold; font-size:13px;
                                    padding:10px; border-bottom:1px solid lightblue; ">
                                Reported By: {{ $news->posted_by }} Date: {{ $news->created_at }} Updated at: {{ $news->updated_at }}
                        </div>
                        <div class="col-md-12" style="font-weight: bold; font-size:13px;">
                            @php
                                echo $news->story;
                            @endphp
                        </div>
                    </div>

                </div>
            </div>
    </div>
@endsection
