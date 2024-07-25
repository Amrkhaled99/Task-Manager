<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateTaskStatistics;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        // Assuming Task has 'assignedTo' and 'assignedBy' relationships defined
        $tasks = Task::with(['assignedTo', 'assignedBy'])->paginate(10);

        return view('tasks.index', compact('tasks'));
    }


    public function createUser()
    {
        // Get all admins and non-admin users for the dropdowns
        $admins = User::where('is_admin', true)->pluck('name', 'id');
        $users = User::where('is_admin', false)->pluck('name', 'id');

        return view('tasks.create', compact('admins', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to_id' => 'required|exists:users,id',
            'assigned_by_id' => 'required|exists:users,id',
        ]);

        // Create a new task
        Task::create($request->all());

        // Dispatch the UpdateStatisticsJob to recalculate statistics
        UpdateTaskStatistics::dispatch();


        // Redirect to the task list page
        return redirect()->route('tasks.create');
    }
}
