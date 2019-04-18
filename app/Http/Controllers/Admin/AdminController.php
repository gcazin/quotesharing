<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    protected $redirectTo = '/user';

    public function __construct ()
    {
        $this->middleware('auth');
        $user = Auth::user();
        print_r($user);
    }

    public function index()
    {
        $user = Auth::user();
        return view('admin.index', compact('user', $user));
    }

}
