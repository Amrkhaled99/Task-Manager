@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>
        <!-- Form to create a new task -->
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <!-- Dropdown to select an admin who is creating the task -->
            <div class="mb-3">
                <label for="assigned_by_id" class="form-label">Admin Name</label>
                <select id="assigned_by_id" name="assigned_by_id" class="form-select" required>
                    <option value="">Select Admin</option>
                    @foreach($admins as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Input field for the task title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <!-- Textarea for the task description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <!-- Dropdown to select the user to whom the task is assigned -->
            <div class="mb-3">
                <label for="assigned_to_id" class="form-label">Assigned User</label>
                <select id="assigned_to_id" name="assigned_to_id" class="form-select" required>
                    <option value="">Select User</option>
                    @foreach($users as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit button to create the task -->
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('assigned_by_id');
        selectElement.options[0].style.display = 'none';
    });

    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('assigned_to_id');
        selectElement.options[0].style.display = 'none';
    });
</script>
