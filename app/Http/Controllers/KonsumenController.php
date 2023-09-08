<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Konsumen::all();
        $branches = Branch::all();
        return view('pages.customers.indexCustomers', [
            'title' => 'Customer',
            'menu_title' => 'customer'
        ], compact(['customers', 'branches']));
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
        // dd($request);
        Konsumen::create($request->all());
        return redirect()->back()->with('success','Data konsumen baru telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Konsumen $konsumen)
    {
        $branches = Branch::all();
        return view('pages.customers.editCustomers', [
            'title' => 'Edit Customer',
            'menu_title' => 'customer'
        ], compact('konsumen', 'branches'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konsumen $konsumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konsumen $konsumen)
    {
        $konsumen->update($request->all());
        return redirect()->route('konsumens.index')->with('success', 'Data konsumen berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konsumen $konsumen)
    {
        $konsumen->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
