<?php

namespace App\Http\Controllers;

use Auth;

use App\Users;

use App\Todo;

use Session;


use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Users::all();

        return view('dashboard.index')->with('users', $user)
                                      ->with('todo', Todo::where('user_id', Auth::user()->id))
                                      ->with('todocomplete', Todo::where([ ['completed', 1], ['user_id', Auth::user()->id] ])->get())
                                      ->with('todouncompleted', Todo::where([ ['completed', 0], ['user_id', Auth::user()->id] ])->get())
                                      ->with('todotrashed', Todo::onlyTrashed()->where('user_id', Auth::user()->id)->get());
        
    }

    public function viewTodo()
    {
        $todo = Todo::all();

        $todooo = Todo::where('user_id', Auth::user()->id)->get();

        if($todooo->count() === 0)
        {
            Session::flash('info', 'You don`t have a Todo, please create one');

            return redirect()->route('todo.create');
        }

        return view('todos.index')->with('todo', $todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'todo' => 'required|max:255|unique:todos',
            ]);

        $todo = Todo::create([
            'todo' => $request->todo,
            'user_id' => Auth::user()->id,
            ]);

        Session::flash('success', 'Your Todo has been created');

        return redirect()->route('todos');

        //$todo->users()->attach($request->tag);
    }

    public function getCompleted($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 1;

        $todo->save();

        Session::flash('success', 'Your Todo has been marked as completed');

        return redirect()->back();
    }

    public function showCompleted()
    {

        $todo = Todo::where([ ['completed', 1], ['user_id', Auth::user()->id] ])->get();

        if($todo->count() == 0)
        {
            Session::flash('info','You dont have a completed Todo');

            return redirect()->route('todos');
        }
       
           return view('todos.completed')->with('todo', $todo); 
        
        
    }

    //controller to make it uncompleted
    public function makeUncompleted($id)
    {
        $todo = Todo::find($id);

        $todo->completed = 0;

        $todo->save();

        Session::flash('success', 'You have make this Todo Uncompleted');

        return redirect()->back();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        Session::flash('success', 'Your Todo has been trashed successfully...');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('todos.edit')->with('todo', Todo::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'todo' => 'required|max:255|unique:todos',
            ]);
        //dd($request->all());
        $todo = Todo::find($id);
        //dd($todo);
        $todo->todo = $request->todo;

        $todo->user_id = Auth::user()->id;

        $todo->save();

        Session::flash('success', 'Your Todo has been updated');

        return redirect()->route('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $todo = Todo::onlyTrashed()->get();

        if($todo->count() == 0)
        {
            Session::flash('info', 'Your trash is empty, you can trash a Todo from the all todo route');

            return redirect()->route('todos');
        }

        return view('todos.trash')->with('todo', $todo);
    }

    public function restore($id)
    {
        $todo = Todo::withTrashed()->where('id', $id)->first();

        $todo->restore();

        Session::flash('success', 'Your Todo has been restored');

        return redirect()->back();
    }

    public function permanentlyDelete($id)
    {
        $todo = Todo::withTrashed()->where('id', $id)->first();

        $todo->forceDelete();

        Session::flash('success', 'Your Todo has been deleted permanently');

        return redirect()->back();
    }

}
