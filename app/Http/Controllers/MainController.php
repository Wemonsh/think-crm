<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {
        $totals = DB::table('documents')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status = 'registered' then 1 end) as registered")
            ->selectRaw("count(case when status = 'pending' then 1 end) as pending")
            ->selectRaw("count(case when status = 'working' then 1 end) as working")
            ->selectRaw("count(case when status = 'completed' then 1 end) as completed")
            ->selectRaw("count(case when status = 'closed' then 1 end) as closed")
            ->first();

        return view('modules.document_flow.index', ['totals' => $totals]);
    }
}
