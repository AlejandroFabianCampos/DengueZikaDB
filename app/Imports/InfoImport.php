<?php

namespace App\Imports;

use App\event;
use Maatwebsite\Excel\Concerns\ToModel;

class InfoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new event([
            'department_name' => $row[0],
            'province_name' => $row[1],
            'epidemical_week' => $row[2],
            'disease' => $row[3],
            'age_group' => $row[4],
            'case_quantity' => $row[5]
        ]);
    }
}
