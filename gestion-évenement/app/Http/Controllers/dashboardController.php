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
        $user->name_user = $request->input('name_user');
        $user->cin = $request->input('cin');
        $user->email_user = $request->input('email_user');
        $user->pw_user = bcrypt($request->input('pw_user'));
        $user->tel_user = $request->input('tel_user');
        $user->id_role = $request->input('id_role');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        return redirect()->route('modulator');
    }

    /**
     * Display the specified resource.
     */
    public function showAll()
    {

        $roles=Role::all();
        if(isset($_GET['updatedUser_id'])){
            $modulator1 = User::find($_GET['updatedUser_id']);
            return view('back_end.modulator',compact('modulator1','roles'));
        }
        else{
            $modulators=User::with('roles')->get();
            return view('back_end.modulator',compact('modulators','roles'));
        }

    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $updatedUser_id)
    {
        $modulator1 = User::find($updatedUser_id);
        $roles=Role::all();
        return view('back_end.modulator', compact('modulator1', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $updatedUser_id)
    {
        $userData = $request->all();
        $userData['updated_at'] = now();
        $userData['remember_token'] = Str::random(10);
        $user = User::findOrFail($updatedUser_id);
        $user->update($userData);
        return redirect()->route('modulator');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $deletedUser_id)
    {
        $user=User::find($deletedUser_id);
        $user->delete();
        return redirect()->back();
    }
}
