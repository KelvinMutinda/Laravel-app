<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index(){
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
}
