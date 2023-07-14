<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendTeamController extends Controller
{
    public function index(){
        $users = User::all();
        $tasks = Task::all();
        return view('frontend.team.index', compact('users', 'tasks'));
    }
    public function pairs(){
        // $invitationId = session()->get('invitationId');
        // dd($invitationId);
        // $invitation = Invitation::find($invitationId);
        // // dd($invitation);
        // $senderName = $invitation->sender->name;
        // $recipientName = $invitation->recipient->name;
        $invitation = Invitation::all();
        $users = User::all();

        // $senderName = "";
        // $recipientName = "";

        // foreach ($invitation as $invite) {
        //     foreach ($users as $user) {
        //         if ($invite->sender_id == $user->id) {
        //             $senderName = $user->name;
        //         }
        //         if ($invite->receipient_id == $user->id) {
        //             $recipientName = $user->name;
        //         }
        //     }
        // }

        // Random Two Word
        $words = ['Big', 'Bones', 'Awesome', 'Frog', 'Fantastic', 'Amazing', 'Poop'];
        $randomWords = array_rand($words, 2);
        $text = $words[$randomWords[0]] . ' ' . $words[$randomWords[1]];

        return view('frontend.team.pair', compact('invitation', 'users', 'text'));
    }
}
