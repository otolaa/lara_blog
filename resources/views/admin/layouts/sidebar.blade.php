<div class="sidebar border-right col-md-2 col-lg-1 p-0 bg-body-tertiary" style="height: calc(100vh - 48px);">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">{{ config('app.name', 'Laravel') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{ (request()->is('admin/users*')) ? 'active' : '' }}" href="{{ route("admin.user.index") }}">
                        <i class="bi bi-people"></i>
                        Пользователи
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}" class="nav-link {{ (request()->is('admin/posts*')) ? 'active' : '' }}">
                        <i class="bi bi-clipboard"></i>
                        Посты
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                        <i class="bi bi-list"></i>
                        Категории
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}" class="nav-link {{ (request()->is('admin/tags*')) ? 'active' : '' }}">
                        <i class="bi bi-tag"></i>
                        Тэги
                    </a>
                </li>
            </ul>

            <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-file-earmark-text"></i>
                        Current month
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-file-earmark-text"></i>
                        Last quarter
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-file-earmark-text"></i>
                        Social engagement
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-file-earmark-text"></i>
                        Year-end sale
                    </a>
                </li>
            </ul>-->

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <!--<li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <i class="bi bi-gear-wide-connected"></i>
                        Settings
                    </a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-door-closed"></i>
                        Выйти
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
