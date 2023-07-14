<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        $invitations = Invitation::all();
        $users = User::all();
        return view('frontend.message.index', compact('invitations', 'users'));
    }
    public function accept(Invitation $invitation){
        $invitation->status = 'accepted';
        $invitation->save();
        return redirect()->back()->with('success', 'Invitation accepted successfully');
    }
    public function reject(Invitation $invitation){
        $invitation->status = 'rejected';
        $invitation->save();
        return redirect()->back()->with('success', 'Invitation rejected successfully');
    }
}
