<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();

        return Inertia::render('Home', [
            'users' => $users,
            'name' => 'Anton Phan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        // atau bisa juga

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // dd($request->all());
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->name);
        $data->save();

        // this also can
        // return to_route('home');
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(User $user)
    // {

    //     return Inertia::render('Edit', [
    //         'user' => $user
    //     ]);
    // }
    public function edit($id)
    {
        $user = User::find($id);
        return Inertia::render('Edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->name, $id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = User::find($id);
        if ($data != null) {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();
        }

        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
    }
}
