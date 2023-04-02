<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // ユーザー登録画面の表示
    public function showRegister()
    {
    return view('/account/register'); 
    }

    // ユーザー登録ボタンをクリック
    public function register(Request $request)
    {
        // 入力内容のバリデート
        $validated = $request->validate([
            // 入力ルールに従っているか, passwordは確認用と一致しているか
            'name' => 'required',
            'employeeNumber' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:4|confirmed',
        ],
        [
            'name.required'=>'名前は必須項目です',
            'employeeNumber.required'=>'社員IDは必須項目です',
            'employeeNumber.unique'=>'入力された社員IDは既に登録されています',
            'email.required'=>'メールアドレスは必須項目です',
            'email.unique'=>'入力されたメールアドレスは既に登録されています',
            'password.required'=>'パスワードは必須項目です',
            'password.confirmed'=>'パスワードが一致していません'
        ]);

        // ユーザー情報作成
        $user = new User;
        $user->name = $request->name;
        $user->employeeNumber = $request->employeeNumber;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->save();
    return redirect('/'); 
    }

    // ログイン画面を表示
    public function login()
    {
    return view('account.login'); 
    }

    //   // ログインボタンをクリック
      public function auth(Request$request)
      {
        $credentials = $request->validate([
            'employeeNumber' => ['required'],
            'password' => ['required'],
        ],
        [   
            'employeeNumber.required'=>'社員IDを入力して下さい',
            'password.required'=>'パスワードを入力して下さい',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->withErrors([
            'message' => '入力内容が不正です',
        ]);
    }
    
    // ログアウト
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }


}






?>
