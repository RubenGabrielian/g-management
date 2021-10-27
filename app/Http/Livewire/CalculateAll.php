<?php

namespace App\Http\Livewire;

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

        $this->totals = \App\Models\Salary::select("*", DB::raw("sum(price) as total_price"), DB::raw("sum(qm) as total_qm"))
            ->where("month", $this->month)->where("year", $this->year)->with('worker')
            ->groupBy("worker_id")
            ->get();

        foreach ($this->totals as $total) {
            $this->allPrice += $total->total_price;
        }

        return view('livewire.calculate-all', [
            "totals" => $this->totals,
            "all" => $this->allPrice,
            "selectedDate" => $this->date
        ]);
    }
}
