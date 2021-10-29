<?php

namespace App\Http\Livewire;

use App\Models\Work;
use Livewire\Component;

class Salary extends Component
{

    public $worker;
    public $date;
    public $price;
    public $qm;
    public $work;

    protected $rules = [
        'date' => 'required',
    ];

    protected $messages = [
        'date.required' => 'Ամսաթիվը պարտադիր է',
    ];


    public function submit () {
        $this->validate();

        $exp = explode("-", $this->date);

        $salary = new \App\Models\Salary();
        $salary->worker_id = $this->worker->id;
        $salary->month = (int)$exp[1];
        $salary->day = (int)$exp[2];
        $salary->year = (int)$exp[0];
        $salary->qm = $this->qm;
        $salary->work_id = $this->work;
        $salary->save();
        session()->flash('message', 'Աշխատավարձը հաջողությամբ ավելացավ');


        $this->date = '';
        $this->price = '';
        $this->qm = '';
    }

    public function render()
    {
        $works = Work::latest()->get();
        return view('livewire.salary', [
            "works" => $works
        ]);
    }
}
