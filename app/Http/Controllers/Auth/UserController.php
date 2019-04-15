<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('dashboard.index',compact('user', $user));
    }

    public function update()
    {
        $user = Auth::user();
        return view('dashboard.update',compact('user', $user));
    }

    public function update_avatar(Request $request)
    {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('public/avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()
            ->with('success','You have successfully upload image.');

    }

    public function update_info(Request $request)
    {
        $data = $request->validate([
            'last_name' => 'string|max:25',
            'first_name' => 'string|max:25',
            'email' => 'string|email|max:255'
        ]);

        $user = Auth::user();

        $user->last_name = $data['last_name'];
        $user->first_name = $data['first_name'];
        $user->email = $data['email'];

        $user->save();
        return back()
            ->with('success', 'Informations bien mise à jour');
    }

}
