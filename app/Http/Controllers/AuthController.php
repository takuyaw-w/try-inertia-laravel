<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class AuthController extends Controller
{
    //ログイン画面を表示
    public function index()
    {
        return Inertia::render('Auth/Login');
    }

    // ログインする
    public function login(Request $request)
    {
        // バリデーション
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        // ログイン処理
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            // ログイン成功
            return redirect()->route('todo-list.index');
        } else {
            // ログイン失敗
            $request->session()->flash('message', 'メールアドレスか、パスワードが間違っています');

            return redirect()->route('auth.login');
        }
    }

    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    // ユーザー作成する
    public function create(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        // ユーザー作成
        $user = resolve(User::class);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('auth.login');
    }
}
