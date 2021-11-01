<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Workers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        return view("workers.add");
    }

    public function list()
    {
        $workers = Worker::with('position')->get();
        return view("workers.list", [
            'workers' => $workers
        ]);
    }

    public function addSalary(Request $request)
    {
        $worker = Worker::where("id", $request->id)->firstOrFail();
        return view('workers.addSalary', [
            'worker' => $worker
        ]);
    }

    public function calculate(Request $request)
    {
        $worker = Worker::where("id", $request->id)->firstOrFail();
        $a = \App\Models\Salary::where("worker_id", 4)->where("year", 2021)->where("month", 10)->with('worker')->with('work')->get();
        return view("workers.calculate", [
            "worker" => $worker
        ]);
    }

    public function calculateAll()
    {

        $workers = [];
        $builders = [];
        $temp_array = array();
        $i = 0;
        $key_array = array();
        $temp_array_builders = array();
        $j = 0;
        $key_array_builders = array();


        $allWorkers = Salary::where("month", 10)->where("year", 2021)->with('worker')->with("work")->get();
        foreach ($allWorkers as $worker) {
            if ($worker->worker->position_id == 1) {
                array_push($workers, $worker);
            } else if ($worker->worker->position_id == 2) {
                array_push($builders, $worker);
            }
        }

        foreach ($workers as $worker) {
            $banvorSalary = Salary::where("worker_id", $worker->worker_id)->where("month", 10)->where("year", 2021)->get();
            $worker['count'] = count($banvorSalary);
            $worker['month_salary'] = $worker->count * $worker->worker->default_salary;

            if (!in_array($worker["worker_id"], $key_array)) {
                $key_array[$i] = $worker["worker_id"];
                $temp_array[$i] = $worker;
            }
            $i++;
        }


        foreach ($builders as $builder) {

            $builder['qm_salary_work'] = $builder->work->qm_price * $builder->qm;

            if (!in_array($builder["worker_id"], $key_array)) {
                $key_array_builders[$j] = $builder["worker_id"];
                $temp_array_builders[$j] = $builder;
            }
            $j++;
        }

        foreach($temp_array_builders as $val) {
            $val['total_month_salary'] = $val->qm_salary_work += $val->qm_salary_work;
        }

        return $temp_array_builders;

////        $totals = Salary::where("month", 10)->where("year", 2021)->with('worker')->select("price")->groupBy("worker_id")->get();
//
//
//        $a = Salary::select("*", DB::raw("sum(price) as user_count"),  DB::raw("sum(qm) as total_qm"))
//                ->where("month", 10)->where("year", 2021)->with('worker')
//                ->groupBy("worker_id")
//                ->get();
//        return $a;

        return view("calculate.all");
    }
}
