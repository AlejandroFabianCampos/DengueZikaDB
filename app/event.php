<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'department_name', 
        'province_name', 
        'epidemical_week', 
        'disease',
        'age_group',
        'case_quantity'
    ];
}
