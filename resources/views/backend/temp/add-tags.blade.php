<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="col-md-10 card bg-light">

    <div class="col-md-9 card">

        <div class="row">
            <div class="col-md-12">
                <strong>
                        Add Tags
                </strong>
                <hr>
            </div>

            {!! Form::open(['route'=>'post.tags']) !!}

            @php
                for($i=0; $i<5; $i++){
                    echo(Form::label('tag_field_'.($i+1), '', ['class'=>'col-md-3 text-right', 'style'=>'color:red; font-weight:bold']));
                    echo(Form::text('tag_field_'.($i+1), '', ['class'=>'col-md-7', 'placeholder'=>'Tag '.($i+1)]));
                }
            @endphp


            {!! Form::submit('Save Tags', ['class'=>'col-md-4 offset-4 mt-3']) !!}

            {!! Form::close() !!}

        </div>

    </div>

