<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Date;
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
    public $prepayments;
    public $grandTotalWithPrepayments = 0;
    public $prepayment;
    public $showPrepayment = false;
    public $debts = 0;
    public $grandTotal = 0;


    public function calc()
    {
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
        if (!empty($this->salary)) {
            foreach ($this->salary as $sal) {
                if ($sal->worker->position_id == 1) {
                    $this->total += $sal->worker->default_salary;
                } else {
                    $this->total += $sal->qm * $sal->work->qm_price;
                }
            }
        }

        $this->prepayments = \App\Models\Prepayment::where("worker_id", $this->worker->id)
            ->where("month", $month)
            ->where("year", $year)
            ->get();

        $this->grandTotalWithPrepayments = 0;
        $this->debts = 0;
        $this->grandTotal = 0;
        if (!empty($this->prepayments)) {
            foreach ($this->prepayments as $prepayment) {
                if($prepayment->type == "prepayment") {
                    $this->grandTotalWithPrepayments += $prepayment->price;
                } else if ($prepayment->type == "debt") {
                    $this->debts += $prepayment->price;
                }
            }
            $this->grandTotal = ($this->total - $this->grandTotalWithPrepayments) + $this->debts;
        } else {
            $this->grandTotal = $this->total;
        }
    }

    public function print()
    {
        $this->dispatchBrowserEvent('print-total-salaries');
    }

    public function takeDept()
    {
        $this->showPrepayment = true;
    }

    public function addPrepayment()
    {
        $date = new \DateTime($this->month);
        $next =  $date->modify('next month');
        $nextMonth =  $next->format("d");
        $nextMonthYear = $next->format("Y");
        $prepayment = new \App\Models\Prepayment();
        $prepayment->worker_id = $this->worker->id;
        $prepayment->type = "debt";
        $prepayment->price = $this->prepayment;
        $prepayment->day = 0;
        $prepayment->month = $nextMonth;
        $prepayment->year = $nextMonthYear;
        $prepayment->save();
        session()->flash('message', 'Հաջողությամբ պահպանվեց');
        $this->prepayment = '';
    }

    public function render()
    {

        if (isset($_GET['date'])) {
            $this->month = $_GET['date'];
            $this->calc();
        }

        return view('livewire.calculate', [
            "test" => $this->test,
            "salary" => $this->salary,
            "total" => $this->total,
            "prepayments" => $this->prepayments,
            "grandTotalWithPrepayments" => $this->grandTotalWithPrepayments,
            "debts" => $this->debts,
            "grandTotal" => $this->grandTotal
        ]);
    }
}
