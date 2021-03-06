<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="col-md-10">
    <div class="row">
        <div class="col-md-12 card">
            Add User
        </div>
        <div class="col-md-12">
            {!! Form::open(['route'=>'add.user']) !!}

            {!! Form::text('user_id', '', ['class'=>'col-md-4 mt-2', 'placeholder'=>'User ID']) !!}


            {!! Form::label('created_at', "Date", ['class'=>'col-md-2']) !!}

            {!! Form::date('created_at', Carbon\Carbon::now(), ['class'=>'col-md-4']) !!}

            {!! Form::label('password', "Password", ['class'=>'col-md-2']) !!}
            {!! Form::password('password', ['col-md-12']) !!}

            {!! Form::label('user_name', "User Name", ['class'=>'col-md-2']) !!}

            {!! Form::text('user_name','', ['class'=>'col-md-4 mt-2', 'placeholder'=>'User Name']) !!}



            {!! Form::submit('Add', ['class'=>'col-md-3  offset-2 mt-2 btn btn-primary']) !!}


            {!! Form::close() !!}

        </div>
    </div>
</div>

