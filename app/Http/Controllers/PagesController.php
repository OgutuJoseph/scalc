<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Salary-Calculator';
        return view('pages.index')->with('title',$title);
    }
    
    public function about(){
        $data = array(
            'title' => 'About The Application',
            'features' =>['Employee Data Storage','Salary Calculation']
        );
        return view('pages.about')->with($data);
    }
}
