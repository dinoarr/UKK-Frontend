@extends('layouts.app')

@section('title')
    <a href="/tasks" class="text-decoration-none text-muted">Tasks /</a>
    <a class="text-decoration-none text-black">Edit</a>
@stop

@section('content')
    <div style="margin-top: 64px;">
        <h2 style="font-size: 20px; font-weight: 400;">Edit Task</h2>
        <div class="card border-0 shadow p-3 mb-5">
            <p class="m-0 ms-3" style="color: #FF0000">* Indicated required fields</p>
            <div class="card-body">
                <form action="{{ route('task.update', $tasks->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="task_name" style="color: #5A607F; font-size: 14px;">Task Name<span
                                style="color: #FF0000">*</span></label>
                        <input type="text" name="task_name" class="form-control" value="{{ $tasks->task_name }}" required
                            style="border: 1px solid #D9E1EC; border-radius: 4px;">
                        @error('task_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="deadline" style="color: #5A607F; font-size: 14px;">Date<span
                                style="color: #FF0000">*</span></label>
                        <input type="date" min="<?= date('Y-m-d') ?>" name="deadline" class="form-control"
                            value="{{ $tasks->deadline }}" style="border: 1px solid #D9E1EC; border-radius: 4px;" required>
                        @error('deadline')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" style="color: #5A607F; font-size: 14px;">Description<span
                                style="color: #FF0000">*</span></label>
                        <textarea name="description" class="form-control" style="border: 1px solid #D9E1EC; border-radius: 4px;" required>{{ $tasks->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="priority" style="color: #5A607F; font-size: 14px;">Priority<span
                                style="color: #FF0000">*</span></label>
                        <select name="priority" class="form-select"  style="border: 1px solid #D9E1EC; border-radius: 4px;"
                            required>
                            <option value="Low" {{ $tasks->priority == "Low" ? 'selected' : ""}}>Low</option>
                            <option value="Medium" {{ $tasks->priority == "Medium" ? 'selected' : ""}}>Medium</option>
                            <option value="High" {{ $tasks->priority == "High" ? 'selected' : ""}}>High</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mt-5 gap-3">
                        <a href="{{ route('task.index') }}" class="btn btn-custom-4">Cancel</a>
                        <button type="submit" class="btn btn-custom-5">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
