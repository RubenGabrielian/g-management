<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Prepayment extends Component
{
    public $type;
    public $price;
    public $date;
    public $worker;
    public $label;
    public $disabled = 'disabled';


    public function submit () {
        $explodeDate = explode("-", $this->date);
        $year = $explodeDate[0];
        $month = $explodeDate[1];

        $prepayment = new \App\Models\Prepayment();
        $prepayment->worker_id = $this->worker->id;
        $prepayment->type = $this->type;
        $prepayment->price = $this->price;
        $prepayment->day = 0;
        $prepayment->month = $month;
        $prepayment->year = $year;
        $prepayment->save();
        session()->flash('message', 'Հաջողությամբ պահպանվեց');

        $this->type = '';
        $this->price = '';
    }

    public function render()
    {
        if($this->type == 'debt') {
            $this->label = "Ընտրեք թե որ ամսին եք ցանկանում տալ պարտքը";
            $this->disabled = '';
        } else if($this->type == "prepayment") {
            $this->label = "Ընտրեք թե որ ամսի աշխատավարձից եք ցանկանում ստանալ կանխավճարը";
            $this->disabled = '';
        }
        return view('livewire.prepayment');
    }
}
