@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h2>Create Task</h2>
                    </div>
                    <div class="card-body">
                        <!-- Form to create a new task -->
                        <form action="{{ route('tasks') }}" method="POST">
                            @csrf

                            <!-- Dropdown to select an admin who is creating the task -->
                            <div class="mb-3">
                                <label for="assigned_by_id" class="form-label">Admin Name</label>
                                <select id="assigned_by_id" name="assigned_by_id" class="form-select" required>
                                    <option value="" disabled selected>Select Admin</option>
                                    @foreach($admins as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Input field for the task title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter task title" required>
                            </div>

                            <!-- Textarea for the task description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter task description" required></textarea>
                            </div>

                            <!-- Dropdown to select the user to whom the task is assigned -->
                            <div class="mb-3">
                                <label for="assigned_to_id" class="form-label">Assigned User</label>
                                <select id="assigned_to_id" name="assigned_to_id" class="form-select" required>
                                    <option value="" disabled selected>Select User</option>
                                    @foreach($users as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit button to create the task -->
                            <div class="text-center">
                                <button type="submit" class="btn bg-dark text-light px-4">Create Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide the default placeholder option in select elements
        var selectElements = document.querySelectorAll('select');
        selectElements.forEach(select => {
            select.querySelector('option[value=""]').style.display = 'none';
        });
    });
</script>
