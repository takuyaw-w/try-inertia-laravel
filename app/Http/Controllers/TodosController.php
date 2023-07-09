<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequst;
use Inertia\Inertia;

class TodosController extends Controller
{
    //一覧を表示する
    public function index()
    {
        return Inertia::render('TodoList/Index', [
            'todos' => Todos::all()
        ]);
    }

    // Todoを作成する
    public function create(TodoRequst $request)
    {
        $todo = resolve(Todos::class);
        $todo->content = $request->safe()->content;
        $todo->status = $request->status;
        $todo->save();
        return redirect()->route('todo-list.index');
    }

    // Todoを削除する
    public function delete(int $id)
    {
        $todo = Todos::find($id);
        $todo->delete();
        return redirect()->route('todo-list.index');
    }
}
