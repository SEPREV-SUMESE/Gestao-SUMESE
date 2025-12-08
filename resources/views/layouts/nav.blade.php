<!-- Main sidebar container -->
<div class="sidebar" id="sidebar">
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="sidebar-header">
        <img src="{{ asset('assets/img/logo-full.svg') }}" alt="SUMESE Logo" class="logo-full">
    </div>

        <!-- Sidebar menu -->
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
            <a href="{{ route('dashboard') }}"
            class="sidebar-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home icon"></i> <span class="label">Início</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="{{ route('socioeducating.index') }}"
            class="sidebar-menu-link {{ request()->routeIs('socioeducating.*') ? 'active' : '' }}">
                <i class="fas fa-users icon"></i> <span class="label">Socioeducandos</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="#"
            class="sidebar-menu-link {{ request()->is('unidades*') ? 'active' : '' }}">
                <i class="fas fa-building icon"></i> <span class="label">Unidades</span>
            </a>
        </li>

        <li class="sidebar-menu-item">
            <a href="#"
            class="sidebar-menu-link {{ request()->is('usuarios*') ? 'active' : '' }}">
                <i class="fas fa-user-plus icon"></i> <span class="label">Usuários</span>
            </a>
        </li>
    </ul>

    <!-- Sidebar footer -->
    <div class="sidebar-footer">
        <a href="#" class="admin-button">
            <span class="label">Administrador</span>
            <i class="icon-arrow-bg"></i>
        </a>
        <p class="text-muted small-text">Secretaria de Estado de Prevenção à Violência</p>
        <div class="logo-container">
            <img src="{{ asset('assets/img/logo-alagoas.svg') }}" alt="Alagoas Logo">
        </div>
    </div>
</div>