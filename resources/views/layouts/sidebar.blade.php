<!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
          <div class="sidebar-brand-icon">
            <i class="fas fa-coffee"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Dashboard</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Accueil</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Publications
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts.create') }}">
            <i class="fas fa-bullhorn fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Créer une annonce</span></a>
        </li>

         <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home.posts', ['user' => Auth::user()->username]) }}">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Liste de mes annonces</span></a>
        </li>

         <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Mon compte
        </div>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profiles.edit', ['user' => Auth::user()->username]) }}">
            <i class="fas fa-fw fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Réglages du compte</span>
          </a>
        </li>

         <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Réglages Dashboard</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->