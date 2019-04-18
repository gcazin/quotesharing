<?php

namespace App\Http\Controllers\Quote;

use App\Category;
use App\Http\Controllers\Controller;
use App\Quote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function publish(Request $request)
    {
        $data = $request->validate([
            'quote' => 'required|string|max:255',
            'category' => 'required|string'
        ]);

        $user = Auth::user();
        $quote = new Quote();

        $quote->quote = $data['quote'];
        $quote->user_id = $user->id;
        $quote->category_id = $data['category'];

        $quote->save();

        return back()
            ->with('success', 'Citation publié');

    }

    public function index()
    {
        return view('citations');
    }

    public function destroy($id)
    {
        Quote::findOrFail($id)->delete();
        return view ('citations')->with ([
            'flash_message' => 'Supprimé',
            'flash_message_important' => false]
        );
    }
}
