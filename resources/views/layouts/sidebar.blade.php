    {{-- Custom styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">

    <div class="sidebar-custom shadow">
        <div class="sidebar-header">
            <div class="logo">
                <span class="menu-text">Taskly</span>
            </div>
        </div>
        <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-house-chimney"></i>
            <span class="menu-text">Dashboard</span>
        </a>
        <a href="{{ route('task.index') }}" class="menu-item {{ request()->routeIs('task.*') ? 'active' : '' }}">
            <i class="fas fa-clipboard-list"></i>
            <span class="menu-text">Tasks</span>
        </a>
        <a href="{{ route('completed') }}" class="menu-item {{ request()->routeIs('completed') ? 'active' : '' }}">
            <i class="fas fa-clipboard-check"></i>
            <span class="menu-text">Completed Tasks</span>
        </a>
    </div>
