@extends('layouts.layout-backend')

@section('content')

    <div class="col-md-10" style="	background:#D1EEEE">

            <div class="col-md-11 ml-1 bg-success text-white card-header">
                    News Management
            </div>

            <div class="col-md-12 mt-2">
                <a href="{{ route('show.news') }}">
                    <span class="badge badge-danger py-2"> <i class="fa fa-hand-o-left fa-2x"></i> Go Back</span>

                </a>
            </div>
            @if (Session::has('search_empty'))
                @php
                    $msg= Session::get('search_empty');
                @endphp
                    <div class="col-md-12  mt-2 alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $msg }}</strong>
                    </div>
            @endif

            <div class="col-md-11 ml-1  card-body">

                {!! Form::open(['route'=>'search', 'method'=>'get']) !!}
                <div class="row">
                            <div class="col-md-12">
                                {!! Form::text('search', '', ['class'=>'col-md-12 form-input-text',
                                                'placeholder'=>'Search news']) !!}
                            </div>


                            <div class="col-md-12 mt-4 pb-1" style="border-bottom:2px solid red;">
                                {!! Form::submit('Search', ['class'=>'col-md-2 offset-5 btn btn-primary']) !!}
                            </div>
                            <hr>
                </div>
                        {!! Form::close() !!}
            </div>

            <div class="col-md-12">
                <div class="row">
                    @php
                        $news_array= News::all();
                    @endphp

                    <div class="col-md-12">
                            <table class="table" >

                                    <th style="border-bottom:3px solid grey;"> ID </th>
                                    <th style="border-bottom:3px solid grey;"> Title </th>
                                    <th style="border-bottom:3px solid grey;"> Created </th>
                                    <th style="border-bottom:3px solid grey;"> Modify </th>

                                @foreach ($news_array as $news)
                                        <tr class="bg-light" style="border-bottom:10px solid grey;" >
                                            <td class="text-danger" style="font-weight:bold;">{{ $news->id }}</td>

                                            <td style="font-weight:bold; font-size:14px;">
                                                <a style=" color:red;" href="{{ route('show.news.indv', $news->id) }}">
                                                    {{ $news->title }}
                                                </a>
                                            </td>

                                            <td class="text-danger">{{ Carbon\Carbon::parse($news->created_at)->format('d/m/Y')}}</td>

                                            <td class="text-danger" style="font-weight:bold;">
                                                <a href="{{ route('show.news.indv', $news->id) }}"  style="text-decoration: none;">
                                                    <span class="badge badge-pill badge-info" style="padding:5px;">View</span>
                                                </a>
                                                <a href="{{ route('show.edit',$news->id) }}">
                                                    <span class="badge badge-pill badge-warning" style="padding:5px;">Edit</span>
                                                </a>
                                                <a href="{{ route('delete.news',$news->id) }}" onclick="return confirm('Are You Sure To Delete?')"
                                                                class="badge badge-pill badge-danger">
                                                    Delete
                                                </a>

                                           </td>
                                    </tr>
                                @endforeach

                            </table>

                    </div>

                </div>
            </div>
    </div>



@endsection
