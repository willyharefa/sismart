<?php

namespace App\Http\Controllers;

use App\Models\TypeAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'menu_title' => 'custom-services'
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
        return view('pages.custom.typeAction.updateTypeAction', [
            'title' => 'Edit Action',
            'menu_title' => 'custom-services'
        ], compact('typeAction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeAction $typeAction)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name_action' => 'required',
                'status_action' => 'required',
                'detail_action' => 'required'
            ]);

            if ( $validator->fails() ) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $typeAction->update($request->all());
            return redirect()->route('type-action.index')->with('success', 'Data telah berhasil diperbaharui');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeAction $typeAction)
    {
        $typeAction->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
