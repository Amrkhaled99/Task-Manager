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
        // Get a paginated list of tasks, including details of who the task is assigned to and who assigned it
        $tasks = Task::with(['assignedTo', 'assignedBy'])->paginate(10);
        // Pass the tasks to the view
        return view('tasks.index', compact('tasks'));
    }


    public function createUser()
    {
        // Get all admins and non-admin users for the dropdowns
        $admins = User::where('is_admin', true)->pluck('name', 'id');
        $users = User::where('is_admin', false)->pluck('name', 'id');

        // Show the task creation form with the lists of admins and users
        return view('tasks.create', compact('admins', 'users'));
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to_id' => 'required|exists:users,id',
            'assigned_by_id' => 'required|exists:users,id',
        ]);

        // Create a new task with the validated data
        Task::create($request->all());

        // Recalculate task statistics in the background ( Update task statistics )
        UpdateTaskStatistics::dispatch();

        // Redirect to the list of tasks
        return redirect()->route('tasks');
    }
}
