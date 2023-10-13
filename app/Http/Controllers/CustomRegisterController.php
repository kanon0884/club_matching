<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CustomRegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // ここにユーザー登録に関するカスタムロジックを追加

    // 例: ユーザー登録フォームのカスタムバリデーションルール

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            // その他のカスタムルールを追加
        ]);
    }
    
        protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // カスタムフィールドなどを追加
            'role' => $data['role'],
        ]);
    }
    
    

    // ユーザー登録後の処理などをカスタマイズ

    // ユーザー登録成功後のリダイレクト先などを設定
}

