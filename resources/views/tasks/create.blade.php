@extends('layouts.app')

@section('title')
    <a href="/tasks" class="text-decoration-none text-muted">Tasks /</a>
    <a class="text-decoration-none text-black">Create</a>
@stop

@section('content')
    <div style="margin-top: 64px;">
        <h2 style="font-size: 20px; font-weight: 400;">Create Task</h2>
        <div class="card border-0 shadow p-3 mb-5">
            <p class="m-0 ms-3" style="color: #FF0000">* Indicated required fields</p>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="task_name" style="color: #5A607F; font-size: 14px;">Task Name<span
                                style="color: #FF0000">*</span></label>
                        <input type="text" name="task_name" class="form-control" value="{{ old('task_name') }}" required
                            style="border: 1px solid #D9E1EC; border-radius: 4px;">
                    </div>

                    <div class="form-group mb-3">
                        <label for="x" style="color: #5A607F; font-size: 14px;">Date<span
                                style="color: #FF0000">*</span></label>
                        <input type="date" min="<?= date('Y-m-d') ?>" name="date" class="form-control"
                            value="{{ old('date') }}" style="border: 1px solid #D9E1EC; border-radius: 4px;" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" style="color: #5A607F; font-size: 14px;">Description<span
                                style="color: #FF0000">*</span></label>
                        <textarea name="description" class="form-control" style="border: 1px solid #D9E1EC; border-radius: 4px;" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="task_name" style="color: #5A607F; font-size: 14px;">Priority<span
                                style="color: #FF0000">*</span></label>
                        <select name="" class="form-select" style="border: 1px solid #D9E1EC; border-radius: 4px;"
                            required>
                            <option value="" selected disabled hidden>Choose Priority</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">Low</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mt-5 gap-3">
                        <a href="/tasks" class="btn btn-custom-4">Cancel</a>
                        <button type="submit" class="btn btn-custom-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
