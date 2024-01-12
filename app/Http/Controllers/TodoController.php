<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; // Add the Todo model

class TodoController extends Controller
{
    public function index()
    {
        // Fetch todos from the database or wherever you store them
        $todos = Todo::all();

        // Pass the $todos variable to the view
        return view('app', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Create a new TODO list
        Todo::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
        ]);

        // Redirect back to the form
        return redirect()->route('todos.index');
    }

    public function delete(Request $request, $id)
    {
        // validate the request
        // ให้รับ $id มาจาก Request
        // และใช้เมธอด find บนโมเดล Todo เพื่อหา Todo ที่ต้องการลบ
        $todo = Todo::find($id);
        if ($todo) {
            // ถ้าพบ, ให้ใช้เมธอด delete เพื่อลบข้อมูล
            $todo->delete();
        }
        // Redirect back to the form
        return redirect()->route('todos.index');
    }
}
