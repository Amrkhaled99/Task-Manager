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

                        <div class="d-flex justify-content-center mt-4">
                            <!-- Previous Page Link -->
                            <a href="{{ $tasks->previousPageUrl() }}" class="btn btn-dark mx-1 {{ $tasks->onFirstPage() ? 'disabled' : '' }}">
                                &laquo; Previous
                            </a>

                            <!-- Page Number Links -->
                            @for($i = 1; $i <= $tasks->lastPage(); $i++)
                                <a href="{{ $tasks->url($i) }}" class="btn btn-outline-dark mx-1 {{ $tasks->currentPage() == $i ? 'active' : '' }}">
                                    {{ $i }}
                                </a>
                            @endfor

                            <!-- Next Page Link -->
                            <a href="{{ $tasks->nextPageUrl() }}" class="btn btn-dark mx-1 {{ !$tasks->hasMorePages() ? 'disabled' : '' }}">
                                Next &raquo;
                            </a>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
