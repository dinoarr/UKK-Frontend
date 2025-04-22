@extends('layouts.app')

@section('title')
    <a class="text-decoration-none text-black">Dashboard</a>
@stop

@section('content')
    <div class="card border-0 shadow mb-4" style="background-color: #007CCE">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 style="font-size: 25px; color: #fff;font-weight: 500"><span
                            style="color: #CED5DC; font-weight: 300;">Hello</span>
                        There!,
                    </h3>
                    <p style="font-size: 15px; font-weight: 400; color: #fff">Keep things organized and don't forget to
                        finish
                        <br>
                        your tasks!
                    </p>
                </div>
                <div>
                    <img src="{{ asset('assets/images/todolist.png') }}" width="150" height="150" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Task Statistics Cards -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-body px-3 py-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px; background-color: #4CB9FF;">
                            <i class="fas fa-clipboard-list text-white" style="font-size: 22px;"></i>
                        </div>
                        <div>
                            <h2 class="mb-0" style="font-size: 22px; font-weight: 500; color: #6C757D;">{{ $tasksAll }}</h2>
                            <p class="mb-0" style="font-size: 14px; color: #9AA0A6;">Number of Task</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-body px-3 py-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px; background-color: #4CB9FF;">
                            <i class="fas fa-clipboard-check text-white" style="font-size: 22px;"></i>
                        </div>
                        <div>
                            <h2 class="mb-0" style="font-size: 22px; font-weight: 500; color: #6C757D;">{{ $tasksDone }}</h2>
                            <p class="mb-0" style="font-size: 14px; color: #9AA0A6;">Task Completed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow">
                <div class="card-body px-3 py-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 50px; height: 50px; background-color: #4CB9FF;">
                            <i class="fas fa-thumbtack text-white" style="font-size: 22px;"></i>
                        </div>
                        <div>
                            <h2 class="mb-0" style="font-size: 22px; font-weight: 500; color: #6C757D;">{{ $tasksPending }}</h2>
                            <p class="mb-0" style="font-size: 14px; color: #9AA0A6;">Task Incompleted</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Important Tasks Section -->
    <div class="mb-4">
        <h5 class="mb-3" style="font-weight: 400">Important Tasks</h5>
        <div class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table mb-5">
                        <thead>
                            <tr>
                                <th style="color: #5A607F; font-weight: 400; font-size: 14px;">No</th>
                                <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Tasks Name</th>
                                <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Date</th>
                                <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Description</th>
                                <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Priority</th>
                                <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tasks-table-body">
                            @if ($tasks->isEmpty())
                                <tr>
                                    <td style="color: #131523; font-weight: 400; font-size: 14px" colspan="6"
                                        class="text-center">No data alvailable</td>
                                </tr>
                            @else
                                @foreach ($tasks as $item)
                                    <tr>
                                        <td style="color: #131523; font-weight: 400; font-size: 14px">{{ $loop->iteration }}
                                        </td>
                                        <td style="color: #131523; font-weight: 400; font-size: 14px">{{ $item->task_name }}
                                        </td>
                                        <td style="color: #131523; font-weight: 400; font-size: 14px">
                                            {{ \Carbon\Carbon::parse($item->deadline)->format('F j, Y') }}</td>
                                        <td style="color: #131523; font-weight: 400; font-size: 14px">
                                            {{ Str::limit($item->description, 13, '...') }}</td>
                                        <td style="color: #131523; font-weight: 400; font-size: 14px"><span
                                                class="badge {{ $item->priority == 'Low'
                                                    ? 'badge-custom-1'
                                                    : ($item->priority == 'Medium'
                                                        ? 'badge-custom-3'
                                                        : 'badge-custom-2') }}">{{ $item->priority }}</span>
                                        </td>
                                        <td style="color: #131523; font-weight: 400; font-size: 14px"><span
                                                class="badge badge-custom-3">{{ $item->status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
