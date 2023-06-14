<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        // Получаем хеш пароля из базы данных
        $hashedPassword = User::where('name', $name)->value('password');
            // Проверяем введенный пользователем пароль
        if (Hash::check($password, $hashedPassword)) {
            $new_token = md5(Str::random(20));
            User::where('name', $name)->update([
                'remember_token' => $new_token
            ]);
            return array([
                'token'=> $new_token
            ]);
        } else {
            return 'НЕТ';
        }
        // $password = $request->password;

        $get_user = User::where('name', $name)->where('password', $password)->get();
        return $password;
        // if(count($get_user) > 0){

        //     'remember_token' => Hash::make(Str::random(20))
        // // }
    }
}
