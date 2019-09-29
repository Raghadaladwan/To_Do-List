   {{ Form::label('tasks','Task Name',['class'=>'control-label']) }}
   {{ Form::text('tasks', null , ['class'=>'form-control form-control-lg','placeholder'=> 'Task Name']) }}

{{--   {{ Form::label('date','Date',['class'=>'control-label']) }}--}}
{{--   {{ Form::date('name', \Carbon\Carbon::now() ,['class' =>'form-control'] ) }}--}}

   <div class="row justify-content-center mt-3">
       <div class="col-sm-4">
           <a href="{{ route('tasks.index') }}" class="btn btn-block btn-secondary">Go Back</a>
       </div>
       <div class="col-sm-4">
           <button class="btn btn-block btn-info" type="submit">
               Save Task
           </button>
       </div>
   </div>
{!! Form::close() !!}

