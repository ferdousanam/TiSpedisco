<?php

namespace App\Http\Controllers\FrontEndCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }
    public function home()
    {
        return redirect()->route('user.dashboard');
    }
    public function dashboard()
    {
        return view('User.profile.pages.dashboard');
    }
    public function ticket()
    {
        return view('User.profile.pages.ticket');
    }
    public function getTickets()
    {
        $tickets = auth()->user()->tickets;
        return response()->json(['success' => true, 'message' => "Successfull", 'tickets' => $tickets]);
    }
    public function cruTicket(Request $request)
    {
        $action = $request->action;
        $ticket = null;
        switch ($action) {
            case 'create':
                $validatedData = $request->validate([
                    'ticket' => 'present|array',
                    'ticket.title' => 'required|string|min:3',
                    'ticket.message' => 'required|string|min:3',
                ]);
                $ticketData = $validatedData['ticket'];

                $ticket = Ticket::create([
                    'user_id' => auth()->user()->id,
                    'title' => $ticketData['title'],
                    'message' => $ticketData['message'],
                    'status' => 'unread',
                    'state' => 'open'
                ]);
                return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
                break;
            
            case 'update':
                return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
                break;
            
            case 'delete':
                return response()->json(['success' => true, 'message' => "Successfull"]);
                break;
            
            case 'status':
                return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
                break;

            case 'reply':
                return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
                break;
            
            default:
                return response()->json(['success' => false, 'message' => "Action not defined"]);
                break;
        }
    }
    public function order()
    {
        return view('User.profile.pages.order');
    }
    public function address()
    {
        return view('User.profile.pages.address');
    }
    public function creditCard()
    {
        return view('User.profile.pages.creditCard');
    }
    public function profile()
    {
        return view('User.profile.pages.profile');
    }
    public function passChange()
    {
        return view('User.profile.pages.passChange');
    }
    public function fatture()
    {
        return view('User.profile.pages.fatture');
    }
}