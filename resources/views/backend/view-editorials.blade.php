@extends('layouts.layout-backend')

@section('content')

    <div class="col-md-10" style="	background:#D1EEEE">

            <div class="col-md-11 ml-1 bg-success text-white card-header">
                    Editorial Management
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
                                                'placeholder'=>'Search Editorials']) !!}
                            </div>
                            <!--
                            <div class="col-md-7" style="font-weight: bold;">
                                <div class="row">
                                    {!! Form::label('start_date', 'From', ['class'=>'col-md-2 text-danger']) !!}
                                    {!! Form::date('start_date', '', ['class'=>'col-md-4 form-control']) !!}

                                    {!! Form::label('end_date', 'To', ['class'=>'col-md-2 text-danger']) !!}
                                    {!! Form::date('end_date', '', ['class'=>'col-md-4 form-control']) !!}

                                </div>
                            </div>
                        -->
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
                        $editorial_array= Editorial::all();
                    @endphp

                    <div class="col-md-12">
                            <table class="table" >

                                    <th style="border-bottom:3px solid grey;"> ID </th>
                                    <th style="border-bottom:3px solid grey;"> Title </th>
                                    <th style="border-bottom:3px solid grey;"> Created </th>
                                    <th style="border-bottom:3px solid grey;"> Modify </th>

                                @foreach ($editorial_array as $editorial)
                                        <tr class="bg-light" style="border-bottom:10px solid grey;" >
                                            <td class="text-danger" style="font-weight:bold;">{{ $editorial->id }}</td>

                                            <td style="font-weight:bold; font-size:14px;">
                                                <a style=" color:red;" href="{{ route('show.news.indv', $editorial->id) }}">
                                                    {{ $editorial->title }}
                                                </a>
                                            </td>

                                            <td class="text-danger">{{ Carbon\Carbon::parse($editorial->created_at)->format('d/m/Y')}}</td>

                                            <td class="text-danger" style="font-weight:bold;">
                                                <a href="{{ route('show.news.indv', $editorial->id) }}"  style="text-decoration: none;">
                                                    <span class="badge badge-pill badge-info" style="padding:5px;">View</span>
                                                </a>
                                                <a href="{{ route('editorial.edit.form', $editorial->id) }}">
                                                    <span class="badge badge-pill badge-warning" style="padding:5px;">Edit</span>
                                                </a>
                                                <a href="{{ route('delete.news',$editorial->id) }}" onclick="return confirm('Are You Sure To Delete?')"
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
