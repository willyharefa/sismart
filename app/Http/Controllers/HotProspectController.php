<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use App\Models\Ticket;

class HotProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $tickets = Ticket::with('prospects', 'konsumens', 'type_service', 'type_customer')->whereHas('prospects', function ($query) {
        //     $query->whereHas('type_action', function ($dataAction) {
        //         $dataAction->where('priority_action', 'final-prospect');
        //     });
        // })->get(); // for searching data into child to child relation

        $tickets = Ticket::with('prospects', 'konsumens', 'type_service', 'type_customer')->where('status_ticket', 'final-prospect')->latest()->get();
        return view('pages.activities.prospect.hotProspect.indexHotProspect', [
            'title' => 'Hot Prospect Page',
            'menu_title' => 'prospects',
        ], compact('tickets'));
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
