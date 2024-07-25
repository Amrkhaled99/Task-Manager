@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card card-header shadow-sm ">
                    <div class="m-4 card-header bg-dark text-white text-center">
                        <h2>User Task Statistics</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th class="text-center">User</th>
                                <th class="text-center">Task Count</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($topUsers as $statistic)
                                <tr>
                                    <td class="text-center">{{ $statistic->user->name }}</td>
                                    <td class="text-center">{{ $statistic->task_count }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
