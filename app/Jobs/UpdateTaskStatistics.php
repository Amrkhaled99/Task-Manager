<?php

namespace App\Jobs;

use App\Models\TaskStatistic;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateTaskStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Fetch user task counts using Eloquent's withCount
        $users = User::withCount('assignedTasks')->get();

        foreach ($users as $user) {
            TaskStatistic::updateOrCreate(
                ['user_id' => $user->id],
                ['task_count' => $user->assigned_tasks_count]
            );
        }
    }
}
