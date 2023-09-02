<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password as RulesPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.account.users.indexUser', [
            'title' => 'User Page',
            'menu_title' => 'user',
        ]);
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

        $validatorData = Validator::make($request->all(), [
            'name_user' => ['required'],
            'employed_id' => ['required','unique:users,employed_id'],
            'birth_date' => ['required','date'],
            'gender' => ['required'],
            'email' => ['required','email'],
            'phone' => ['required'],
            'branch' => ['required'],
            'username' => ['required','unique:users,username'],
            'password' => ['required','confirmed', RulesPassword::min(4)->letters()->mixedCase()->numbers()->uncompromised()],
        ]);


        if($validatorData->fails()) {
            return redirect()->back()->withErrors($validatorData)->withInput();
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
