<?php

namespace App\Http\Controllers\Invite;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class InvitationController extends Controller
{
    public function index(User $user){
        if ($user->id === auth()->user()->id) {
            throw ValidationException::withMessages([
                'user' => 'You cannot send an invitation to yourself.',
            ]);
        }
        return view('frontend.invitation.index', compact('user'));
    }
    public function sendInvitation(Request $request){
        // dd($request);
        $validated = $request->validate([
            'message' => 'required',
        ]);

        // $recipient = User::where('email', $request->recipient_id)->first();
        // $validated = $request->validate([
        //     'message' => 'required',
        // ]);

        // $recipient = User::where('email', $request->recipient_email)->first();

        // if (!$recipient || $recipient->email === auth()->user()->email) {
        //     return redirect()->back()->withErrors(['recipient_email' => 'Invalid recipient']);
        // }

        // Invitation::create([
        //     'sender_id' => auth()->user()->id,
        //     'receipient_id' => $recipient->id,
        //     'message' => $validated['message'],
        // ]);

        // return view('frontend.team.index');
        // dd($recipient);
        // $users = User::all();
        // foreach ($users as $user){
        //     foreach ($user->email as $user_email) {
        //         if ($request->recipient_email == $user_email) {
        //             dd($user_email);
        //             Invitation::create([
        //                 'sender_id' => auth()->user()->id,
        //                 'receipient_id' => $user->id,
        //                 'message' => $validated['message'],
        //             ]);
        //             return view('frontend.team.index');
        //         }
        //     }
        // }
        // $users = User::all();

        // foreach ($users as $user) {
        //     if ($request->recipient_email == $user->email) {
        //         Invitation::create([
        //             'sender_id' => auth()->user()->id,
        //             'receipient_id' => $user->id,
        //             'message' => $validated['message'],
        //         ]);
        //         return view('frontend.team.index');
        //     }
        // }

        // // If no matching recipient email is found
        // return redirect()->back()->withErrors(['recipient_email' => 'Invalid recipient']);
        $users = User::all();

        foreach ($users as $user) {
            if ($request->recipient_email == $user->email) {
                $invitation = new Invitation();
                $invitation->sender_id = auth()->user()->id;
                $invitation->receipient_id = $user->id;
                $invitation->message = $validated['message'];
                $invitation->save();

                // Session::put('invitationId', $invitation->id);
                return redirect()->route('front.team.pairs');
            }
        }

        // If no matching recipient email is found
        return redirect()->back()->withErrors(['recipient_email' => 'Invalid recipient']);
    }
}
