<?php

namespace App\Http\Controllers;

use App\Models\TaskStatistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{



    public function index()
    {
        $topUsers = TaskStatistic::with('user')
            ->orderByDesc('task_count')
            ->take(10)
            ->get();

        return view('statistics.index', compact('topUsers'));
    }
}
