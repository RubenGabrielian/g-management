<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalariesController extends Controller
{
    public function add(Request $request)
    {
        foreach($request->selectedDates as $date) {

            $explodedDate = explode("-",$date);
            $salary = new Salary();
            $salary->worker_id = $request->worker_id;
            $salary->day = $explodedDate[0];
            $salary->month = $explodedDate[1];
            $salary->year = $explodedDate[2];
            $salary->save();
        }

        return 'ok';
    }
}
