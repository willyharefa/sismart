<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use App\Models\Ticket;
use App\Models\TypeAction;
use Illuminate\Auth\Events\Validated;
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
        try {
            $validateData = Validator::make($request->all(), [
                'ticket_id' => 'required|numeric',
                'type_action_id' => 'required|numeric',
                'date_progress' => 'required|date',
                'issue' => 'required',
                'desc_action' => 'required',
                'remarks' => 'required'
            ]);

            if ($validateData->fails()) {
                return redirect()->back()->with('failed', 'Something wrong with you field!');
            }

            $typeAction = TypeAction::findOrFail($request->type_action_id);
            Ticket::findOrFail($request->ticket_id)->update([
                'status_ticket' => $typeAction->priority_action
            ]);
            Prospect::create($request->all());
            return redirect()->back()->with('success', 'Data has been added');        

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('failed', 'You request cant be process!');
        }
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

            $typeAction = TypeAction::findOrFail($request->type_action_id);
            Ticket::findOrFail($request->ticket_id)->update([
                'status_ticket' => $typeAction->priority_action
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
            return redirect()->back()->with('failed', 'You request cant be proccess!');
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
