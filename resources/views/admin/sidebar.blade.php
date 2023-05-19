<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #f8f9fa; color: #333;">
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle" src="admin/assets/images/JNEC Logo 2021-Final-CYMK.png" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Administrator</h5>
            <span></span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link" style="color: #888;">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('add_event_view')}}" style="color: #333;">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Add Event</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('edit_event')}}" style="color: #333;">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Edit Event</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('add_user')}}" style="color: #333;">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Add User</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('view_details')}}" style="color: #333;">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Delete details</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('edit_department')}}" style="color: #333;">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Add Department</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{url('add_programme')}}" style="color: #333;">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Add Programme</span>
      </a>
    </li>
  </ul>
</nav>
