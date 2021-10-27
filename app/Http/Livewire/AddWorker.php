<?php

namespace App\Http\Livewire;

use App\Models\Worker;
use Livewire\Component;

class AddWorker extends Component
{
    public $name;
    public $surname;
    public $position;


    protected $rules = [
        'name' => 'required',
        'surname' => 'required',
        'position' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Անունը պարտադիր է',
        'surname.required' => 'Ազգանունը պարտադիր է',
        'position.required' => 'Պաշտոնը պարտադիր է',
    ];


    public function add () {
        $this->validate();

        $worker = new Worker();
        $worker->name = $this->name;
        $worker->surname = $this->surname;
        $worker->position = $this->position;
        $worker->save();
        session()->flash('message', 'Աշխատակիցը հաջողությամբ ավելացավ');

    }

    public function render()
    {
        return view('livewire.add-worker');
    }
}
