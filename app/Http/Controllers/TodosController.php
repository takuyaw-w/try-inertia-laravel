<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequst;
use Inertia\Inertia;

class TodosController extends Controller
{
    //一覧を表示する
    public function index(Request $req)
    {
        $queryParams = $req->query('status');

        if (is_null($queryParams) || $queryParams == 'all') {
            return Inertia::render('TodoList/Index', [
                'todos' => Todos::all()
            ]);
        } else {
            return Inertia::render('TodoList/Index', [
                'todos' => Todos::where('status',  $queryParams)->get(),
                'queryParams' => $queryParams,
            ]);}
    }

    // Todoを作成する
    public function create(TodoRequst $request)
    {
        $todo = resolve(Todos::class);
        $todo->content = $request->safe()->content;
        $todo->status = $request->safe()->status;
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

    // Todoを編集する
    public function edit(int $id)
    {
        $todo = Todos::find($id);
        return Inertia::render('TodoList/Edit', [
            'todo' => $todo
        ]);
    }

    // todoを更新する
    public function update(TodoRequst $request, int $id)
    {
        $todo = Todos::find($id);
        $todo->content = $request->safe()->content;
        $todo->status = $request->safe()->status;
        $todo->save();
        return redirect()->route('todo-list.index');
    }
}
