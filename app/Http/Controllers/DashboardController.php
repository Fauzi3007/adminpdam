<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;

class DashboardController extends Controller
{
    public function index()
    {
        
        $title = 'Dashboard';
        $data = [
            [
                "name" => "John Doe",
                "email" => "johndoe@example.com",
                "spent" => 100.50,
                "country" => "Indonesia"
            ],
            [
                "name" => "Jane Smith",
                "email" => "janesmith@example.com",
                "spent" => 25.99,
                "country" => "United States"
            ]
        ];

       
        
          
        return view('pages/dashboard/dashboard', compact('title','data'));
    }

    /**
     * Displays the analytics screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function analytics()
    {
        return view('pages/dashboard/analytics');
    }

    /**
     * Displays the fintech screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fintech()
    {
        return view('pages/dashboard/fintech');
    }
}
