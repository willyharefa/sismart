<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Ticket;
use App\Models\TypeAction;
use App\Models\TypeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsumens = Konsumen::all();
        $typeActions = TypeAction::all();
        $type_services = TypeService::all();
        $tickets = Ticket::with('prospects')->orderBy('id', 'DESC')->get();
        return view('pages.activities.tickets.indexTickets', [
            'title'=> 'Ticket Page',
            'menu_title' => 'ticket'
        ], compact('tickets', 'konsumens', 'typeActions', 'type_services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request['cd_ticket'] = 'T-'.Carbon::now()->timestamp;
        $request['status'] = 'Draf';
        Ticket::create($request->all());
        return redirect()->route('ticket.index')->with('success', 'Data ticket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $konsumens = Konsumen::all();
        return view('pages.activities.tickets.updateTicket', [
            'title' => 'Update Ticket',
        ], compact('ticket', 'konsumens'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
