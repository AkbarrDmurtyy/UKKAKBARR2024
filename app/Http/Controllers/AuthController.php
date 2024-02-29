<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login')->with('success', 'register successfully');
        
        if (Auth::attempt($user)) {
            return redirect('/login')->with('success', 'Login Berhasil');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $item = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($item)) {
            return redirect('/home')->with('success', 'Login Berhasil');
        }

        return back()->with('error', 'Email atau Password anda salah');
    }

    public function logout()
{
    Auth::logout();
    return redirect('/login');
}
public function search(Request $request)
{
    $data = $request->search;
    $data = buku::where('name', 'like', "%" . $data . "%")->paginate(5);
    return view('layouts,products,index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
}

public function cetak()
{
    $data = buku::orderBy('judul')->get();
    return view ('layouts.products.cetak')->with('data', $data);
}


}