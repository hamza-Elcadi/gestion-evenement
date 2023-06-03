<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;



class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back_end.dashboard');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name_user = $request->input('name');
        $user->cin = $request->input('cin');
        $user->email_user = $request->input('email');
        $user->pw_user = bcrypt($request->input('pw'));
        $user->tel_user = $request->input('tel');
        $user->id_role = $request->input('role');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect('admin/modulator');
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $modulators=User::with('roles')->get();
        $roles=Role::all();
        return view('back_end.modulator',compact('modulators','roles'));
    }
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
