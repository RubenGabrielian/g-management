<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Salary extends Component
{

    public $worker;
    public $date;
    public $price;
    public $qm;

    protected $rules = [
        'date' => 'required',
        'price' => 'required',
    ];

    protected $messages = [
        'date.required' => 'Ամսաթիվը պարտադիր է',
        'price.required' => 'Գումարը պարտադիր է',
    ];


    public function submit () {
        $this->validate();

        $exp = explode("-", $this->date);

        $salary = new \App\Models\Salary();
        $salary->worker_id = $this->worker->id;
        $salary->price= $this->price;
        $salary->month = (int)$exp[1];
        $salary->day = (int)$exp[2];
        $salary->year = (int)$exp[0];
        $salary->qm = $this->qm;
        $salary->save();
        session()->flash('message', 'Աշխատավարձը հաջողությամբ ավելացավ');


        $this->date = '';
        $this->price = '';
        $this->qm = '';
    }

    public function render()
    {
        return view('livewire.salary');
    }
}
