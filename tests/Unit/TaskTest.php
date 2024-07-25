<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_task_creation()
    {
        // Ensure users with IDs 1 exist or create them as needed
        $user = User::factory()->create(); // Create a user
        $admin = User::factory()->create(); // Create an admin

        // Simulate a POST request to create a new task
        $response = $this->actingAs($admin)->post('/tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin->id,
        ]);


        // Verify that the response correctly redirects to the task list page after task creation
        $response->assertRedirect('/tasks');


        // Verify that the newly created task is saved in the database
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin->id,
        ]);
    }
    public function test_task_list_pagination()
    {
        // Simulate a GET request to the task list page
        $response = $this->get('/tasks');

        // Verify that the response contains pagination controls like "Next"
        $response->assertSeeText('Next');
    }
    public function test_task_list_page_loads()
    {
        // Create an admin user
        $admin = User::factory()->create(['is_admin' => true]);

        // Simulate a GET request to the task list page
        $response = $this->actingAs($admin)->get('/tasks');

        // Verify that the response status is 200 OK
        $response->assertStatus(200);

    }
    public function test_statistics_page()
    {
        // Simulate a GET request to the statistics page
        $response = $this->get('/tasks/statistics');

        // Verify that the response status is 200 OK
        $response->assertStatus(200);
    }

}
