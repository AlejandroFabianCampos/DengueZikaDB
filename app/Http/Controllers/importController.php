<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InfoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class importController extends Controller
{
    public function import() 
    {
        Excel::import(new InfoImport, request()->file('file'));
        return redirect('/')->with('success', 'All good!');
    }
}
