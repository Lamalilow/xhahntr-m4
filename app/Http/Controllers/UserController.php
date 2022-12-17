<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginView()
    {
        return view('users.login');
    }
    public function loginPost(Request $request)
    {
        $request -> validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('login', 'password')))
        {
            $request ->session()->regenerate();
            return redirect()->route('/');
        }
        return back()->with(['errorLogin' => 'Неправильный логин или пароль']);
    }

    public function registrView()
    {
        return view('users.registration');
    }

    public function registrPost(Request $request)
    {
        $request ->validate([
            'name' => 'required',
            'login' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'success' => 'required',
        ]);
        $request -> merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function warningView()
    {
        $img1 = './resources/image/sudanelzya.jpg';
        $img2 = './resources/image/sudanelzya1.jpg';
        $img3 = './resources/image/sudanelzya2.jpg';
        $img4 = './resources/image/sudanelzya3.jpg';
        $arr = [$img1, $img2, $img3, $img4];
        $random = Arr::random($arr);//randomly selecting 2 numbers from the numbers in the array

        return view('user.warning', compact('random'));
    }
}
