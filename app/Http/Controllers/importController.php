<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\infoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class importController extends Controller
{
    public function import(Request $request) 
    {
        Excel::import(new infoImport(), $request->file('import_file'));
        
        return redirect('/')->with('success', 'All good!');
    }
}
