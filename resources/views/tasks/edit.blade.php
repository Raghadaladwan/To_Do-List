@extends('layouts.main')

@section('title', 'Edit Task')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Edit Task</h1>
            {!! Form::model($task,['route' => ['tasks.update', $task->id],'method'=>'PUT']) !!}


            @component('components.taskForm')
            @endcomponent
        </div>
    </div>
@endsection
