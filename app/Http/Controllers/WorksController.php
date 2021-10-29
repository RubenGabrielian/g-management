<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    public function index()
    {
        return view("works.index");
    }

    public function edit(Request $request)
    {
       $work = Work::where("id", $request->work_id)->firstOrFail();
       $work->qm_price = $request->newPrice;
       $work->save();
       return 'ok';
    }
}
