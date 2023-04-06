<?php

namespace App\Http\Controllers;

use App\Mail\RevisorAccepted;
use App\Mail\RevisorRejected;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return abort(403);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $user = User::find($ticket->user_id);

        if($request->action === 'accepted' && $ticket->type === 'newRevisorRequest'){
            $user->role_id = 3;
            $user->save();

            $ticket->state = 'accepted';
            $ticket->save();

            Mail::to($user->email)->send(new RevisorAccepted());
        }elseif($request->action === 'rejected' && $ticket->type === 'newRevisorRequest'){
            $ticket->state = 'rejected';
            $ticket->save();

            Mail::to($user->email)->send(new RevisorRejected());
        }

        return redirect()->back()->with('success', 'Il ticket è stato correttamente aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        return abort(403);
    }
}
