    {{-- Custom styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">

    <div class="sidebar-custom shadow">
        <div class="sidebar-header">
            <div class="logo">
                <span class="menu-text">Taskly</span>
            </div>
        </div>
        <a href="/" class="menu-item">
            <i class="fas fa-house-chimney"></i>
            <span class="menu-text">Dashboard</span>
        </a>
        <a href="/tasks" class="menu-item ">
            <i class="fas fa-clipboard-list"></i>
            <span class="menu-text">Tasks</span>
        </a>
        <a href="/completed" class="menu-item">
            <i class="fas fa-clipboard-check"></i>
            <span class="menu-text">Completed Tasks</span>
        </a>
    </div>
