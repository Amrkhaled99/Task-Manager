@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Task Statistics</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>User</th>
                <th>Task Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topUsers as $statistic)
                <tr>
                    <td>{{ $statistic->user->name }}</td>
                    <td>{{ $statistic->task_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
