<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;



class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userCount = User::count();
        return view('back_end.dashboard',compact('userCount'));

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
        $validated = $request->validate([
            'name_user' => 'required|unique:users',
        ]);

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
            //$modulator1->pw_user = decrypt($modulator1->pw_user);
            return view('back_end.modulator',compact('modulator1','roles'));
        }
        else{
            $modulators=User::with('roles')->get();
            //$modulators->pw_user = decrypt($modulators->pw_user);
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
        $validated = $request->validate([
            'name_user' => 'required|unique:users,name_user,'.$updatedUser_id.',id_user',
        ]);
        // $userData = $request->all();
        // $request['updated_at'] = now();
        // $request['remember_token'] = Str::random(10);
        // $user = User::findOrFail($updatedUser_id);
        // $user->update($request->all());
        $request['pw_user'] = bcrypt($request['pw_user']);
        $request['updated_at'] = now();
        $request['remember_token'] = Str::random(10);
        User::where('id_user', $updatedUser_id)->update($request->except('_token'));
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

    public function logout()
    {
        Auth::logout();
        // Perform any additional logout tasks if necessary
        // For example, clearing the user session

        return redirect()->route('login');
    }

}
