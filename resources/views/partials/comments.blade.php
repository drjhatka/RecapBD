
<div class="row">

    @if (count($errors)>0)

    @endif

    @if (Session::has('comment_error'))

    @endif
    <div class="card col-md-12">
        <div class="card-body col-md-12" style="border:1px solid red;">
                <div class="row" >
                    <div class="col-md-12 card-header"><strong>Comments</strong></div>
                </div>

                    {!! Form::open(['route'=>['add.comment', $news->id], 'class'=>'form']) !!}
                <div class="row">
                            {!! Form::label('user_name', 'Enter Your Name', ['class'=>'form-control mr-2 col-md-3 text-info']) !!}
                            {!! Form::text('user_name', '', ['class'=>'form-control col-md-6']) !!}

                            {!! Form::label('email', 'Enter Email Address', ['class'=>' mr-2 form-control col-md-3']) !!}
                            {!! Form::email('email', '', ['class'=>'col-md-6 form-control']) !!}

                            {!! Form::label('title', 'Enter Comment Title', ['class'=>' mr-2 form-control col-md-3']) !!}
                            {!! Form::text('title', '', ['class'=>'col-md-6 form-control']) !!}

                            {!! Form::label('content', 'Enter Your Comment', ['class'=>'col-md-3']) !!}

                            <div class="col-md-6"><hr></div>
                            {!! Form::textarea('content', '', ['class'=>'col-md-6 offset-3 form-control']) !!}
                            {!! Form::submit('Submit Comment', ['class'=>'col-md-3 offset-3 btn btn-success mt-2 form-control']) !!}

                </div>
                    {!! Form::close() !!}
        </div>
    </div>
<!-- show comments if any -->
    <div class="row">
        @php
            $comments = Comment::all();
        @endphp
        @if (count($comments)>0)
            @foreach ($comments as $comments)
                <h3>{{ $comments->title }}</h3>
            @endforeach
        @else
        <div class="col-md-12 card-header">
            <h3>No Comments Yet. Be the first to add One</h3>

        </div>
        @endif
    </div>
</div>
