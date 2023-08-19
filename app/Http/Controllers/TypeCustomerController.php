<?php

namespace App\Http\Controllers;

use App\Models\TypeCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeCustomers = TypeCustomer::all();
        return view('pages.custom.typeCustomer.indexTypeCustomer', [
            'title' => 'Type Customer Page',
            'menu_title' => 'custom-services'
        ], compact('typeCustomers'));
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
            $validator = Validator::make($request->all(), [
                'name_type_customer' => 'required',
                'desc_type_customer' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            TypeCustomer::create($request->all());
            return redirect()->back()->with('success', 'Data tipe customer berhasil ditambahkan');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeCustomer $typeCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeCustomer $typeCustomer)
    {
        return view('pages.custom.typeCustomer.updateTypeCustomer', [
            'title' => 'Update Type Customer',
            'menu_title' => 'custom-services'
        ], compact('typeCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeCustomer $typeCustomer)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name_type_customer' => 'required',
                'desc_type_customer' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $typeCustomer->update([
                'name_type_customer' => $request->name_type_customer,
                'desc_type_customer' => $request->desc_type_customer
            ]);

            return redirect()->route('type-customer.index')->with('success', 'Data tipe customer berhasil diperbaharui');
        } catch (\Throwable $th) {
            return redirect()->route('type-customer.index')->with('failed', 'Permintaan anda gagal !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeCustomer $typeCustomer)
    {
        //
    }
}
