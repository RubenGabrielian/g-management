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



    public function calc () {
        $explodeDate = explode("-", $this->month);
        $year = $explodeDate[0];
        $month = $explodeDate[1];
        $this->salary = \App\Models\Salary::where("worker_id", $this->worker->id)->where("year", $year)->where("month", $month)->get();
        $this->total = 0;
        foreach($this->salary as $sal) {
            $this->total += $sal->price;
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
