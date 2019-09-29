
@extends('layouts.main')

@section('title', 'Create Task')

@section('content')
    <div class="row">
        <div class="col-sm-12 mr-5">
            <h1>Craete Task</h1>
            {!! Form::open(['route'=>'tasks.store','method'=>'POST']) !!}


                  @component('components.taskForm')
                  @endcomponent
{{--            {{ !! Form::close()!! }}--}}
        </div>
    </div>
@endsection
