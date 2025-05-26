<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Requests\StoreticketRequest;
use App\Http\Requests\UpdateticketRequest;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$tickets = Ticket::all(); foreach($ticket)echo $ticket->requester->name; //cause n+1 queries
        //dd(DB::enableQueryLog());//query logs
        //$tickets = Ticket::with('requester')-> get();
        //$tickets = Ticket::simplePaginate(15);// ->get() eager load the requester
        //dd(Ticket::all()-> paginate(5));
        //$tickets = Ticket::where('user_id', Auth::id())->latest()->get();
        $tickets = Ticket::where('requester_id', Auth::id())->latest()->simplePaginate(15);
        return view('ticket.index', compact('tickets'));
        //return view('tickets.index', ['tickets' => $tickets,'totalCount' => $tickets->count(),]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreticketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->priority = $request->priority;
        $ticket->status = 'open';  // Default status
        $ticket->department =$request->department;
        $ticket->requester_id = auth()->id();  // Assuming the user is logged in


        //Validate the request
        // $request->validate([
        //     'attachment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);

        if ($request->hasFile('attachment')) {
            $image = $request->file('attachment');
            $filename = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('uploads', $filename, 'public');
            // Save file path in the ticket model
            $ticket->filelink = $path;
        }

        $ticket->save();
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket)
    {
        $this->authorize('view', $ticket);//policies
        // Eager load replies
        $ticket->load('replies');
        //$ticket = Ticket::with('replies')->find($id); 
        
        return view('ticket.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ticket $ticket)
    {
        $this->authorize('update', $ticket);
        return view('ticket.edit',compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateticketRequest $request, ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket $ticket)
    {
        $this->authorize('delete', $ticket);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully');
    }
}
