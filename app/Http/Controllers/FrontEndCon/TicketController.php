<?php

namespace App\Http\Controllers\FrontEndCon;

use App\Http\Controllers\Controller;
use App\TicketReply;
use App\InnerReply;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }
    
    public function ticket()
    {
        return view('User.profile.pages.ticket');
    }
    public function getTickets()
    {
        $user = auth()->user();
        $tickets = User::with('tickets', 'tickets.creator', 'tickets.replies', 'tickets.replies.creator', 'tickets.replies.replies', 'tickets.replies.replies.creator')->find($user->id)->tickets;
        return response()->json(['success' => true, 'message' => "Successfull", 'tickets' => $tickets]);
    }
    public function singleTicket(Request $request)
    {
        $validatedData = $request->validate([
            'ticketId' => 'required|numeric|exists:tickets,id',
        ]);
        $ticket = Ticket::with('replies', 'replies.creator', 'replies.replies', 'replies.replies.creator')->find($validatedData['ticketId']);
        return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
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
                    'file' => $ticketData['file'],
                    'is_paralyzes' => $ticketData['is_paralyzes'] ?? false,
                    'status' => 'unread',
                    'state' => 'open'
                ]);
                return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
                break;
                
            case 'status':
                return response()->json(['success' => true, 'message' => "Successfull", 'ticket' => $ticket]);
                break;
                
            default:
                return response()->json(['success' => false, 'message' => "Action not defined"]);
                break;
        }
    }
    public function cruReply(Request $request)
    {
        $reply_on = $request['reply']['replyOn'] ?? null;
        if (!$reply_on) return response()->json(['success' => false, 'message' => "reply_on not defined"]);
        $reply = null;        
        switch ($reply_on) {
            case 'ticket':
                $validatedData = $request->validate([
                    'reply' => 'present|array',
                    'reply.message' => 'required|string|min:3',
                    'reply.ticketId' => 'required|numeric|exists:tickets,id',
                ]);
                $replyData = $validatedData['reply'];
                $reply = TicketReply::create([
                    'user_id' => auth()->user()->id,
                    'message' => $replyData['message'],
                    'ticket_id' => $replyData['ticketId'],
                    'file' => $replyData['file'],
                    'status' => 'unread',
                    'state' => 'open'
                ]);
                return response()->json(['success' => true, 'message' => "Successfull", 'reply' => $reply]);
                break;
            
            case 'reply':
                $validatedData = $request->validate([
                    'reply' => 'present|array',
                    'reply.message' => 'required|string|min:3',
                    'reply.replyId' => 'required|numeric|exists:ticket_replies,id',
                ]);
                $replyData = $validatedData['reply'];
                $reply = InnerReply::create([
                    'user_id' => auth()->user()->id,
                    'reply_id' => $replyData['replyId'],
                    'message' => $replyData['message'],
                    'file' => $replyData['file'],
                    'status' => 'unread',
                    'state' => 'open'
                ]);
                return response()->json(['success' => true, 'message' => "Successfull", 'reply' => $reply]);
                break;

            default:
                return response()->json(['success' => false, 'message' => "Action not defined"]);
                break;
        }        
    }
    
    public function fileUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:jpeg,png,jpg,doc,docx,xl,xls,csv|max:5000',
        ]);
        $originalName = $name = $request->file->getClientOriginalName();
        $getFileName = time() . '-' . $originalName;
        $upload = $request->file->move(public_path('uploads/file'), $getFileName);
        if ($upload) {
            return response()->json(['success' => true, 'url' => 'uploads/file/'.$getFileName, 'message' => "Action successfull"]);
        }
        return response()->json(['success' => false, 'message' => "Action not completed"]);
    }
}
