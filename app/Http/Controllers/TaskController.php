<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            // dd(Auth::id());
            $user_id = Auth::id();
            $tasks = Task::where('user_id', $user_id)->get();
            return view('tasks.index')->with('tasks', $tasks);

        } else {
            return view('welcome');
        }

//        return view('tasks.index')->withTasks($tasks);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('tasks.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate the Data
        $this->validate($request, [
            'tasks' => 'required|string',
        ]);

        // Create a new task
        $task = new Task;

        // Assign the task data from our request
        $task->tasks = $request->tasks;
//        $task->user_id = '1';
        $task->user_id = auth()->id();
//        $task->date = $request->date;

        // Save the task
        $task->save();
        // Flash session message
        Session::flash('success', 'Create Task Successfully');
        // Return A Redirect
        return redirect()->route('tasks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // search the task
        //return a view(show.blede.php
        // pass with the return
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);


        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the Data
        $this->validate($request, [
            'tasks' => 'required|string',
        ]);

        // Find the related task
        $task = Task::find($id);

        // Assign the task data from our request
        $task->tasks = $request->tasks;
//        $task->user_id = '1';
//        $task->date = $request->date;
        $task->user_id = auth()->id();

        // Save the task
        $task->save();
        // Flash session message
        Session::flash('success', 'Save The Task Successfully');
        // Return A Redirect
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the task
        $task = Task::find($id);
        // Delete task
        $task->delete();

//        Session::flash('success','DELETE');

        return redirect()->route('tasks.index');

    }
}
