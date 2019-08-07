<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\infoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class importController extends Controller
{
    public function import() 
    {
        Excel::import(new \infoImport, request()->file('TablaDengueYZika.xlsx'), null, \Maatwebsite\Excel\Excel::XLSX);
        
        return redirect('/')->with('success', 'All good!');
    }
}
