@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task List</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Assigned To</th>
                <th>Admin Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->assignedTo->name ?? 'N/A' }}</td>
                    <td>{{ $task->assignedBy->name ?? 'N/A' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $tasks->links() }}
    </div>
@endsection
