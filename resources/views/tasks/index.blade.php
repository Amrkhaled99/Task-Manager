@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h2>Task List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Assigned To</th>
                                <th class="text-center">Admin Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="text-center">{{ $task->title }}</td>
                                    <td class="text-center">{{ $task->description }}</td>
                                    <td class="text-center">{{ $task->assignedTo->name ?? 'N/A' }}</td>
                                    <td class="text-center">{{ $task->assignedBy->name ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center">
                            {{ $tasks->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
