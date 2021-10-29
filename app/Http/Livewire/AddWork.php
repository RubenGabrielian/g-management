<?php

namespace App\Http\Livewire;

use App\Models\Work;
use Livewire\Component;

class AddWork extends Component
{

    public $name;
    public $works;
    public $qm_price;
    public $changedPrice;
    protected $rules = [
        'name' => 'required',
    ];


    protected $messages = [
        'name.required' => 'Անունը պարտադիր է',
    ];


    public function add () {
        $this->validate();
        $work = new Work();
        $work->name = $this->name;
        $work->qm_price = $this->qm_price;
        $work->save();
        session()->flash('message', 'Աշխատանքը հաջողությամբ ավելացավ');

        $this->name = '';
        $this->qm_price = '';
    }

    public function openEdit () {
        $this->dispatchBrowserEvent("show-edit-popup");
    }


    public function render()
    {
        $this->works = Work::latest()->get();
        return view('livewire.add-work',[
            "works" => $this->works
        ]);
    }
}
