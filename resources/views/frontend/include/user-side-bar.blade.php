<nav class="sidebar">
    <div class="sidebar-content">
        <a class="sidebar-brand" href="{{ route("admin") }}">
            <i class="align-middle" data-feather="box"></i>
            <span class="align-middle">{{ config('app.name') }}</span>
        </a>
        <ul class="sidebar-nav">
            {{--<li class="sidebar-item active">--}}
                {{--<a href="{{ route("admin") }}" class="sidebar-link">--}}
                    {{--<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>--}}
                    {{--<span class="sidebar-badge badge badge-primary">6</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="sidebar-item">
                <a href="{{ route("project.index") }}" class="sidebar-link">
                    <i class="align-middle" data-feather="aperture"></i> <span class="align-middle">Project</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route("link.index") }}" class="sidebar-link">
                    <i class="align-middle" data-feather="aperture"></i> <span class="align-middle">Link</span>
                </a>
            </li>
        </ul>
    </div>
</nav>