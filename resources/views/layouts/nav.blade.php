<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Task Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}" href="{{ route('tasks.create') }}">Create Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('statistics.index') ? 'active' : '' }}" href="{{ route('statistics.index') }}">Task Statistics</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
