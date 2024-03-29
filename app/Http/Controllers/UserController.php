<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.account.users.indexUser', [
            'title' => 'User Page',
            'menu_title' => 'user',
        ], compact('users'));
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
        $validatorData = Validator::make($request->all(), [
            'name_user' => ['required', 'min:5'],
            'employed_id' => ['required', 'unique:users,employed_id'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required'],
            'email' => ['required'],
            'phone' => ['required', 'min:10'],
            'branch' => ['required'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'confirmed', Password::min(5)],
        ]);
        if ($validatorData->fails()) {
            return redirect()->back()->withErrors($validatorData)->withInput();
        }

        User::create([
            'name' => $request->name_user,
            'employed_id' => $request->employed_id,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'branch' => $request->branch,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Data has been added!');

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
            'password' => ['required','confirmed', Password::min(4)->letters()->mixedCase()->numbers()->uncompromised()],
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
        return view('pages.account.users.updateUser', [
            'title' => 'Update Page',
            'menu_title' => 'user',
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validatorData = Validator::make($request->all(), [
                'name_user' => ['required', 'min:5'],
                'birth_date' => ['required', 'date'],
                'gender' => ['required', 'in:Male, Female'],
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', Password::min(5)],
            ]);

            if ($request->password !== null) {

                if($validatorData->fails()) {
                    return redirect()->back()->with('failed', 'Something wrong with you input');
                };

                $user->update([
                    'name' => $request->name_user,
                    'employed_id' => $request->employed_id,
                    'birth_date' => $request->birth_date,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'branch' => $request->branch,
                    'username' => $request->username,
                    'password' => Hash::make($request->password)
                ]);
                return redirect()->route('user.index')->with('success', 'Data has been edited');
            } else {
                $user->update([
                    'name' => $request->name_user,
                    'employed_id' => $request->employed_id,
                    'birth_date' => $request->birth_date,
                    'gender' => $request->gender,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'branch' => $request->branch,
                    'username' => $request->username,
                ]);
                return redirect()->route('user.index')->with('success', 'Data has been edited');
            }  
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', 'You request cant be process...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
