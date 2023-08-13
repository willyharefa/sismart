<?php

namespace App\Http\Controllers;

use App\Models\TypeAction;
use Illuminate\Http\Request;

class TypeActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeActions = TypeAction::all();
        return view('pages.custom.typeAction.indexTypeAction', [
            'title' => 'Type Action',
            'menu_title' => 'custome-services'
        ], compact('typeActions'));
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
        $validatedData = $request->validate([
            'name_action' => 'required|string',
            'status_action' => 'required|in:Prospect,Hot Prospect',
            'detail_action' => 'required|string'
        ]);

        if(!$validatedData) {
            return redirect()->back()->withErrors($validatedData);
        }

        TypeAction::create($request->all());
        return redirect()->back()->with('success', 'Data mapping baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeAction $typeAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeAction $typeAction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeAction $typeAction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeAction $typeAction)
    {
        //
    }
}
