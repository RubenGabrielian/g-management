<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculate extends Component
{

    public $worker;
    public $month;
    public $test = '';
    public $salary = '';
    public $total = 0;
    public $work_qm_price = 0;
    public $position_2_total = 0;

    public function calc () {
        $explodeDate = explode("-", $this->month);
        $year = $explodeDate[0];
        $month = $explodeDate[1];
        $this->salary = \App\Models\Salary::where("worker_id", $this->worker->id)
            ->where("year", $year)
            ->where("month", $month)
            ->with('worker')
            ->with('work')
            ->get();


        $this->total = 0;
        foreach($this->salary as $sal) {
            if($sal->worker->position_id == 1) {
                $this->total += $sal->worker->default_salary;
            } else {
                $this->total+= $sal->qm * $sal->work->qm_price;
            }
        }

    }


    public function render()
    {

        if(isset($_GET['date'])) {
            $this->month = $_GET['date'];
            $this->calc();
        }

        return view('livewire.calculate', [
            "test" => $this->test,
            "salary" =>  $this->salary,
            "total" => $this->total
        ]);
    }
}
