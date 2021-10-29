<?php

namespace App\Http\Livewire;

use App\Models\Position;
use App\Models\Worker;
use Livewire\Component;

class AddWorker extends Component
{
    public $name;
    public $surname;
    public $position;
    public $defaultSalary;

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

    public function changePosition ($id) {
        $this->position = $id;
        $this->dispatchBrowserEvent('position-changed',['id' => $id]);
    }

    public function add () {
        $this->validate();

        $worker = new Worker();
        $worker->name = $this->name;
        $worker->surname = $this->surname;
        $worker->position_id = $this->position;
        $worker->default_salary = $this->defaultSalary;
        $worker->save();
        session()->flash('message', 'Աշխատակիցը հաջողությամբ ավելացավ');

        $this->name = '';
        $this->surname = '';
        $this->defaultSalary = '';
    }

    public function render()
    {
        $positions = Position::all();
        return view('livewire.add-worker',[
            "positions" => $positions
        ]);
    }
}
