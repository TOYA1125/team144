<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        //userテーブルに入っているレコードすべて取得する
        $user = User::paginate(10);
        //dd($user); 情報を画面に出力できる。ここで処理止まるので注意

        return view('user/user',)->with([
            'user' => $user,
        ]);
        
    }

    public function userRole(Request $request){

        //ユーザー種別を数値から文字列に変換
        $user = User::where('id', '=', $request->id)->first();
        $user->delete();

        return redirect(  '/user');

    }

    public function edit(Request $request){

        //一覧から指定されたIDと同じIDのレコードを取得する
        $user = User::where('id', '=', $request->id)->first();

        return view('user/edit')->with([
            'user' => $user,
        ]);
    }

    public function store(Request $request){
        $user = User::where('id', '=', $request->id)->first();
        $mailRule="";
        if ($request->email != $user->email){
            $mailRule="|unique:users";
        } 
            $request->validate(
                [//バリデーションチェック
                    'name' => 'required|max:255',
                    'email' => 'required|email'.$mailRule,
                ],
                [
                //第二引数、
                    'name.required' => "名前は必須入力項目です。",
                    'name.max' => "名前は255文字以内で入力してください。",
                    'email.required' => "Emailは必須入力項目です。",
                    'email.email' => "Emailの形式で入力してください。（例）xxx@gmail.com",
                    'email.unique' => "このEmailはすでに登録されています。",
                 ]);

        //既存のレコードを取得して、編集してから保存する
        $user = User::where('id', '=', $request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        
        return redirect(  '/user');
    
    }

    public function userDelete(Request $request){

        //既存のレコードを取得して、削除する
        $user = User::where('id', '=', $request->id)->first();
        $user->delete();

        return redirect(  '/user');

    }

    public function back(Request $request){
     
        //ユーザー一覧画面へ戻る
        return redirect( '/user');
    }

}