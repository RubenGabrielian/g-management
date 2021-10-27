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

    public function add () {
        return view("workers.add");
    }

    public function list () {
        $workers = Worker::all();
        return view("workers.list" ,[
            'workers' => $workers
        ]);
    }

    public function addSalary (Request  $request) {
        $worker = Worker::where("id", $request->id)->firstOrFail();
        return view('workers.addSalary',[
            'worker' => $worker
        ]);
    }

    public function calculate (Request $request) {
        $worker = Worker::where("id", $request->id)->firstOrFail();
        return view("workers.calculate", [
            "worker" =>  $worker
        ]);
    }

    public function calculateAll () {
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
