<?php

namespace App\Http\Controllers;

use App\Models\TaskStatistic;

class StatisticController extends Controller
{


    public function index()
    {
        // Get the top 10 users with the most tasks
        $topUsers = TaskStatistic::with('user')
            ->orderByDesc('task_count')  // Sort by the number of tasks, most first
            ->take(10)  // Only get the top 10 users
            ->get();

        // Show the top users on the statistics page
        return view('statistics.index', compact('topUsers'));
    }
}
