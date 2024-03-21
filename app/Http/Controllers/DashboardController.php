<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;

class DashboardController extends Controller
{
    public function index()
    {
        
        $title = 'Dashboard';
        $header = ['nama','email','spent','country',];
        $actionId = '';
        $data = [];
       
        
          
        return view('pages/dashboard/dashboard', compact('title','header','actionId','data'));
    }

   
}
