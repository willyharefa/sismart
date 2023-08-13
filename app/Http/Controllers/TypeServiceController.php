<?php

namespace App\Http\Controllers;

use App\Models\TypeService;
use Illuminate\Http\Request;

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
            'menu_title' => 'custome-services'
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
        // dd($request->all());
        $validateData = $request->validate([
            'name_service' => 'required|string',
            'desc_service' => 'required|string',
        ]);

        // dd($validateData);

        try {
            if($validateData) {
                TypeService::create($validateData);
                return redirect()->back()->with('success', 'Data services has been add');
            }
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(TypeService $typeService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeService $typeService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeService $typeService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeService $typeService)
    {
        //
    }
}
