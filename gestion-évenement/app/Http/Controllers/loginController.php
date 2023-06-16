<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use function PHPUnit\Framework\isEmpty;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()) {
            return redirect()->intended('admin');
        } else {
            return view('back_end.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function check(Request $request)
    // {
    //     $username=$request->input('username');
    //     $password=$request->input('password');
    // }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'name_user' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('name_user', $credentials['name_user'])->first();
        // dd(Hash::check($credentials['password'], $user->pw_user));
        if ($user && Hash::check($credentials['password'], $user->pw_user)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('name_user'));
    }



    /**
     * Log the user out of the application.
     */
    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
