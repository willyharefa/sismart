<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_services = TypeService::all();
        return view('pages.custom.typeService.indexTypeService', [
            'title' => 'Type Services',
            'menu_title' => 'custom-services'
        ], compact('type_services'));
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

        $validator = Validator::make($request->all(), [
            'name_service' => 'required',
            'desc_service' => 'required'
        ]);

        if($validator->fails()) {        
            return redirect()->back()->withErrors($validator);
        }

        TypeService::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(TypeService $typeService)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeService $typeService)
    {
        return view('pages.custom.typeService.updateTypeService', [
            'title' => 'Edit Service',
            'menu_title' => 'custom-services'
        ], compact('typeService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeService $typeService)
    {
            $validator = Validator::make($request->all(), [
                'name_service' => 'required',
                'desc_service' => 'required',
            ]);

            if ( $validator->fails() ) {
                return redirect()->back()->withErrors($validator);
            }

            $typeService->update([
                'name_service' => $request->name_service,
                'desc_service' => $request->desc_service
            ]);

            return redirect()->route('type-service.index')->with('success', 'Data telah berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeService $typeService)
    {
        $typeService->delete();
        return redirect()->back()->with('success', 'Data telah berhasil di hapus');

    }
}
