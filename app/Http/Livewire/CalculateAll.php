<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CalculateAll extends Component
{
    public $month;
    public $year;
    public $totals;
    public $allPrice = 0;
    public $date;


    public function render()
    {

        $explodedDate = explode("-", $this->date);
        $this->year = $explodedDate[0];
        $this->month = $explodedDate[1];
        $this->allPrice = 0;

//        $this->totals = \App\Models\Salary::select("*", DB::raw("sum(price) as total_price"), DB::raw("sum(qm) as total_qm"))
//            ->where("month", $this->month)->where("year", $this->year)->with('worker')
//            ->groupBy("worker_id")
//            ->get();


//        foreach ($this->totals as $total) {
//            $this->allPrice += $total->total_price;
//        }




        $workers = [];
        $builders =[];
        $workerType1 = [];
        $temp_array = array();
        $i = 0;
        $key_array = array();
        $allWorkers = Salary::where("month", $this->month)->where("year", $this->year)->with('worker')->get();

        foreach($allWorkers as $worker) {
            if($worker->worker->position_id == 1) {
                array_push($workers, $worker);
            } else if($worker->worker->position_id == 2) {
                array_push($builders, $worker);
            }
        }

        foreach($workers as $worker) {
            $workerSalary = Salary::where("worker_id", $worker->worker_id)->where("month", $this->month)->where("year", $this->year)->get();
            $worker['count'] = count($workerSalary);
            $worker['month_salary'] = $worker->count * $worker->worker->default_salary;
            if(!in_array($worker["worker_id"], $key_array)) {
                $key_array[$i] = $worker["worker_id"];
                $temp_array[$i] = $worker;
            }
            $i++;
        }


        return view('livewire.calculate-all', [
            "totals" => $this->totals,
            "all" => $this->allPrice,
            "selectedDate" => $this->date,
            "workers" => $temp_array
        ]);
    }
}
