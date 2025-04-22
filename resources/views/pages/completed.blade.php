@extends('layouts.app')

@section('title')
    <a href="" class="text-decoration-none text-black">Completed Tasks</a>
@stop

@section('content')
    <div style="margin-top: 64px;">
        <h2 style="font-size: 20px; font-weight: 400;">Completed Task List</h2>
        <div class="card border-0 shadow p-3">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 gap-2">
                    <div>
                        <select name="per_page" id="perPage" class="form-select w-auto"
                            style="border: 1px solid #6E7191; border-radius: 4px; color: #6E7191;">
                            <option value="5" {{ request('per_page') == '5' ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                        </select>
                    </div>

                    <div class="flex-grow-1 mx-2 position-relative">
                        <input type="text" id="search" class="form-control w-100" placeholder="Search..."
                            style="border: 1px solid #6E7191; border-radius: 4px; padding-left: 2rem ">
                        <i class="fa fa-search position-absolute"
                            style="left: 10px; top: 50%; transform: translateY(-50%); color: #6E7191;"></i>
                    </div>

                </div>


                <table id="taskTable" class="table table-responsive">
                    <thead>
                        <tr>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">No</th>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Tasks Name</th>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Date</th>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Description</th>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Priority</th>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Status</th>
                            <th style="color: #5A607F; font-weight: 400; font-size: 14px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tasks-table-body">
                        @if ($tasks->isEmpty())
                            <tr>
                                <td style="color: #131523; font-weight: 400; font-size: 14px" colspan="7"
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
                                            class="badge badge-custom-4">{{ $item->status }}</span>
                                    </td>
                                    <td class="d-flex align-items-center gap-2">
                                        <form action="{{ route('task.delete',$item->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-custom-2" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <span style="font-size: 16px; font-weight: 400; color: #5A607F">
                        Showing {{ $tasks->firstItem() }} to {{ $tasks->lastItem() }} of {{ $tasks->total() }} Entries
                    </span>
                    <div class="pagination-container">
                        <nav aria-label="Page navigation">
                            <ul class="custom-pagination">
                                @if ($tasks->onFirstPage())
                                    <li class="pagination-item disabled">
                                        <span class="pagination-link pagination-arrow"><i
                                                class="fa-solid fa-chevron-left"></i></span>
                                    </li>
                                @else
                                    <li class="pagination-item">
                                        <a href="{{ $tasks->previousPageUrl() }}" class="pagination-link pagination-arrow">
                                            <i class="fa-solid fa-chevron-left"></i>
                                        </a>
                                    </li>
                                @endif

                                @foreach ($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                                    @if ($page == $tasks->currentPage())
                                        <li class="pagination-item active">
                                            <span class="pagination-link active">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="pagination-item">
                                            <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($tasks->hasMorePages())
                                    <li class="pagination-item">
                                        <a href="{{ $tasks->nextPageUrl() }}" class="pagination-link pagination-arrow">
                                            <i class="fa-solid fa-chevron-right"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="pagination-item disabled">
                                        <span class="pagination-link pagination-arrow"><i
                                                class="fa-solid fa-chevron-right"></i></span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action cannot be undone!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, Delete!',
                        cancelButtonText: 'Cancel',
                        confirmButtonColor: '#28a745',
                        cancelButtonColor: '#dc3545',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            document.getElementById('perPage').addEventListener('change', function() {
                const perPageValue = this.value;
                const url = new URL(window.location.href);
                url.searchParams.set('per_page', perPageValue);
                window.location.href = url;
            });

            const searchInput = document.getElementById('search');
            const filterTable = (tableBodyId, columnIndices) => {
                const tableBody = document.getElementById(tableBodyId);

                searchInput.addEventListener('input', function() {
                    const searchText = searchInput.value.toLowerCase();

                    Array.from(tableBody.children).forEach(row => {
                        const matches = columnIndices.some(index =>
                            row.children[index].textContent.toLowerCase().includes(
                                searchText)
                        );
                        row.style.display = matches ? '' : 'none';
                    });
                });
            };

            filterTable('tasks-table-body', [1, 2, 3, 4, 5]);
        });
    </script>
@endsection
