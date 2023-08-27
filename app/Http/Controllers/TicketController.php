<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Ticket;
use App\Models\TypeAction;
use App\Models\TypeCustomer;
use App\Models\TypeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $type_customers = TypeCustomer::all();
        $tickets = Ticket::with('prospects','konsumens', 'type_service', 'type_customer')->latest()->get();
        return view('pages.activities.tickets.indexTickets', [
            'title'=> 'Ticket Page',
            'menu_title' => 'ticket'
        ], compact('tickets', 'konsumens', 'typeActions', 'type_services', 'type_customers'));
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
        $request['cd_ticket'] = 'T-'.Carbon::now()->timestamp;
        $request['status_ticket'] = 'draf';


        Ticket::create($request->all());
        return redirect()->route('ticket.index')->with('success', 'Data ticket berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $konsumens = Konsumen::all();
        $type_customers = TypeCustomer::all();
        $type_services = TypeService::all(); 
        return view('pages.activities.tickets.updateTicket', [
            'title' => 'Update Ticket',
            'menu_title' => 'ticket'
        ], compact('ticket', 'konsumens', 'type_customers', 'type_services'));
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
        try {
            $validator = Validator::make($request->all(), [
                'konsumen_id' => 'required|numeric',
                'phone_number' => 'required',
                'name_pic' => 'required|max:32',
                'type_customer_id' => 'required|numeric',
                'type_service_id' => 'required|numeric',
                'sales_pic_a' => 'required',
                'sales_pic_b' => 'required',
                'sales_pic_c' => 'required',
                'desc_ticket' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $ticket->update($request->all());
            return redirect()->route('ticket.index')->with('success', 'Data ticket telah berhasil diperbaharui');

        } catch (\Throwable $th) {
            return redirect()->route('ticket.index')->with('failed', 'Permintaan anda tidak valid');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
