<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use App\Models\Ticket;
use App\Models\TypeAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validateData = $request->validate([
            'ticket_id' => 'required|string|max:255',
            'type_action_id' => 'required|integer',
            'date_progress' => 'required|date',
            'issue' => 'required|string',
            'desc_action' => 'required|string',
            'remarks' => 'required|string'
        ]);

        if(!$validateData) {
            return redirect()->back()->withErrors($validateData)->withInput();
        }

        try {
            $ticket = Ticket::findOrFail($request->ticket_id);
            $typeActions = TypeAction::findOrFail($request->type_action_id);
            $ticket->update([
                'status' => $typeActions->status_action
            ]);
        } catch (ModelNotFoundException $th) {
            return redirect()->back()->with('failed', 'Data ticket tidak tersedia');
        }

        Prospect::create($validateData);
        return redirect()->back()->with('success', 'Data prospect berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prospect $prospect)
    {
        $typeActions = TypeAction::all();
        $ticket = Ticket::with('prospects')->find($prospect->ticket_id);
        return view('pages.activities.prospect.updateProspect', [
            'title'=> 'Action Page',
            'menu_title' => 'ticket'
        ], compact(['prospect','ticket', 'typeActions']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prospect $prospect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prospect $prospect)
    {

        $statusAction = TypeAction::findOrFail($request->type_action_id);
        $ticket = Ticket::findOrFail($request->ticket_id);

        try {
            $validator = Validator::make($request->all(), [
                'date_progress' => 'required|date',
                'remarks' => 'required|max:200',
                'issue' => 'required',
                'desc_action' => 'required',
                'type_action_id' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $ticket->update([
                'status' => $statusAction->status_action
            ]);


            $prospect->update([
                'date_progress' => $request->date_progress,
                'issue' => $request->issue,
                'desc_action' => $request->desc_action,
                'type_action_id' => $request->type_action_id,
                'remarks' => $request->remarks
            ]);
            return redirect()->route('ticket.index')->with('success', 'Progress action telah diupdate');
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prospect $prospect)
    {
        //
    }
}
