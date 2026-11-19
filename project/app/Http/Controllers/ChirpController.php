<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $chirps=Chirp::with('user')
          ->latest()
          ->take(50)
          ->get();
        return view('home',['chirps'=>$chirps]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'message'=>'required|string|max:255'
        ]);

        Chirp::create([
            'user_id'=>'1',
            'message'=>$validated['message'],
        ]);
        return redirect('/')->with('success','Chirp created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
       return view('chirp.edit',compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $validated=$request->validate([
            'message'=>'required|string|max:255'
        ]);

        $chirp->update($validated);
        return redirect('/')->with('success','Chirp Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    
    {
      $chirp->delete();
      return redirect('/')->with('success','Your Chip has been deleted');
    }
}
