<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function publish(Request $request)
    {
        $data = $request->validate([
            'quote' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        $quote = new Post();

        $quote->quote = $data['quote'];
        $quote->idUser = $user->id;

        $quote->save();

        return back()
            ->with('success', 'Citation publié');

    }

    public function index()
    {
        return view('citations');
    }

}
