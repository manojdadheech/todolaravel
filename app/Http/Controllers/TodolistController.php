<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodolistController extends Controller
{

    function index(){
        $todolists = todolist::where('is_completed',0)->get();
        return view('welcome',compact('todolists'));
    }





    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100|unique:todolists,title',
            'description' => 'required|string',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Create a new todo using mass assignment
        $todo = todoList::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
    
        // Check if the todo was created successfully
        if ($todo) {
            return response()->json([
                'success' => true,
                'message' => 'Todo added successfully',
                'data' => $todo,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add todo',
            ], 500);
        }
    }



    function update(Request $request){
    
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100|unique:todolists,title,' .$request->id,
            'description' => 'nullable|string',
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        
        // Create a new todo using mass assignment
        // dd($request->all());
        $todo = todoList::find($request->id);
        
        
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->save();

     

    
        // Check if the todo was created successfully
        if ($todo) {
            return response()->json([
                'success' => true,
                'message' => 'Todo Update successfully',
                'data' => $todo,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Update todo',
            ], 500);
        }
        
    }



    function destroy(Request $request){
        $todolist = todolist::find($request->id);
        if($todolist){
            $todolist->delete();
            return response()->json([   
                'response' => 1,
                'message' => 'Todo deleted successfully',   
                 ], 200);
                }else{  
             return response()->json([   
                 'response' => 0,
                 'message' => 'Todo not found',
                  ], 404);
              }
                                    
    }


    function completetodo($id){
        $todolist = todolist::find($id);
        if($todolist){
            $todolist->is_completed = 1;
            $todolist->save();
            return response()->json([   
                'response' => 1,
                'message' => 'Todo completed successfully',
                'data' => $todolist,
                ], 200);
                }else{
                 return response()->json([
                     'response' => 0,
                     'message' => 'Todo not found',
                     ], 404);
          }

    }


    public function filtersSearch($id = null)
    {
        $id = $id ?? 0; // Default to 0 if $id is null
    
        // Check the condition and set the $todolists accordingly
        if ($id == 2) {
            $todolists = todolist::all();
        } else {
            $todolists = todolist::where('is_completed', $id)->get();
        }
    
        // Prepare the response based on whether any todolists are found
        if ($todolists->isNotEmpty()) {
            return response()->json([
                'response' => 1,
                'message' => 'Todo lists',
                'data' => $todolists,
            ], 200);
        } else {
            return response()->json([
                'response' => 0,
                'message' => 'No Todo lists found for the given filter.',
                'data' => [],
            ]);
        }
    }
    
}
