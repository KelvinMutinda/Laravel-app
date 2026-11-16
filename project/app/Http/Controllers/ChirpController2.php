<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirpController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $chirps=[
            [
                'author'=>'Jane Does',
                'message'=>'Just deployed my first App',
                'time'=>'5 minutes ago'
            ],
            [
                'author'=>'Johns',
                'message'=>'I am diving in into Laravel development',
                'time'=>'1 hour ago'
            ],
            [
                'author'=>'Kassim',
                'message'=>'I am diving in into Laravel development',
                'time'=>'2 hour ago'
            ]
        
        ];

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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
