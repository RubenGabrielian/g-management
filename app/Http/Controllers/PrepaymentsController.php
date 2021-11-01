<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class PrepaymentsController extends Controller
{
    public function index ($id) {
        $worker = Worker::where("id", $id)->firstOrFail();
        return view("prepayments.index", [
            "worker" => $worker
        ]);
    }
}
