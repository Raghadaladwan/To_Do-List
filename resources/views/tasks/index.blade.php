@extends('layouts.main')

@section('title','Tasks Home')

@section('content')

    <div class="row justify-content-center mb-3">
        <div class="col-sm-4">
            <a href="{{ route('tasks.create') }}" class="btn btn-block btn-warning"> Create Task</a>
        </div>
    </div>

    @if($tasks->count() ==0)
        <p class="lead text-center">There are no tasks listed , Why don't create one!</p>
    @else
        @foreach($tasks as $task)
            <div class="row">
                <div class="col-sm-12">
                    <h2>
                        {{ $task->tasks }}
                        <h4> Due Date: <small> {{ $task->created_at }}</small> </h4>
                    </h2>

                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'DELETE']) !!}
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    {!! Form::close() !!}
                    <hr>
                </div>
            </div>

        @endforeach

    @endif




@endsection
