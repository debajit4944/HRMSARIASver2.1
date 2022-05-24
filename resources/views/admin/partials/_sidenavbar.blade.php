<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <img src="{{asset('img/main_logo.png')}}" height="50" width="50" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">HRMS<sup>ARIAS</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User:</h6>
            <a id="createUser" class="collapse-item" href="{{ route('user.create') }}">Create User</a>
            <a id="viewUser" class="collapse-item" href="{{ route('user.index') }}">View User</a>
            <h6 class="collapse-header">District:</h6>
            <a id="createDistrict" class="collapse-item" href="{{ route('district.create') }}">Create District</a>
            <a id="viewDistrict" class="collapse-item" href="{{ route('district.index') }}">View District</a>
            <h6 class="collapse-header">Designation:</h6>
            <a id="createDesignation" class="collapse-item" href="{{ route('designation.create') }}">Create Designation</a>
            <a id="viewDesignation" class="collapse-item" href="{{ route('designation.index') }}">View Designation</a>
            <h6 class="collapse-header">Project:</h6>
            <a id="createProject" class="collapse-item" href="{{ route('project.create') }}">Create Project</a>
            <a id="viewProject" class="collapse-item" href="{{ route('project.index') }}">View Project</a>
            <h6 class="collapse-header">Organization:</h6>
            <a id="createOrganization" class="collapse-item" href="{{ route('organization.create') }}">Create Organization</a>
            <a id="viewOrganization" class="collapse-item" href="{{ route('organization.index') }}">View Organization</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="#">Colors</a>
            <a class="collapse-item" href="#">Borders</a>
            <a class="collapse-item" href="#">Animations</a>
            <a class="collapse-item" href="#">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>