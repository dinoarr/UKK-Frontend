@extends('layouts.app')

@section('title')
    <a href="" class="text-decoration-none text-black">Completed</a>
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
                        <tr>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">1.</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">Coding</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">May 5, 2025</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">Coding is fun...</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px"><span
                                    class="badge badge-custom-1">Low</span>
                            </td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px"><span
                                    class="badge badge-custom-4">Completed</span>
                            </td>
                            <td class="d-flex align-items-center gap-2">
                                <form action="#" method="POST" class="delete-form">
                                    <button type="submit" class="btn btn-sm btn-custom-2" data-toggle="tooltip"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">2.</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">Coding</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">May 5, 2025</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px">Coding is fun...</td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px"><span
                                    class="badge badge-custom-2">High</span>
                            </td>
                            <td style="color: #131523; font-weight: 400; font-size: 14px"><span
                                    class="badge badge-custom-4">Completed</span>
                            </td>
                            <td class="d-flex align-items-center gap-2">
                                <form action="#" method="POST" class="delete-form">
                                    <button type="submit" class="btn btn-sm btn-custom-2" data-toggle="tooltip"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between align-items-center mt-5">
                    <span style="font-size: 16px; font-weight: 400; color: #5A607F">Showing 2 to 2 of 2 Entries</span>
                    <div class="pagination-container">
                        <nav aria-label="Page navigation">
                            <ul class="custom-pagination">

                                <li class="pagination-item">
                                    <a class="pagination-link pagination-arrow" href="#">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                </li>

                                <li class="pagination-item active"><a class="pagination-link active" href="#">1</a>
                                </li>

                                <li class="pagination-item "><a class="pagination-link " href="#">2</a>
                                </li>

                                <li class="pagination-item">
                                    <a class="pagination-link pagination-arrow" href="#">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
