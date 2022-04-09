<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="{{ route("admin.home") }}">
         <img src="../assets/img/logo.png"  alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}" href="{{ route("admin.home") }}">
                  <i class="ni ni-tv-2 fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Home</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/resident_list') || request()->is('admin/resident_list/*') ? 'active' : '' }}" href="{{ route("admin.resident") }}">
                <i class="fas fa-users fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Resident</span>
                </a>
              </li>
              
              <!-- <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/brgy_certificate') || request()->is('admin/brgy_certificate/*') ? 'active' : '' }}" href="{{ route("admin.brgy_certificate.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Brgy Certificate</span>
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/certificate_of_residency') || request()->is('admin/certificate_of_residency/*') ? 'active' : '' }}" href="{{ route("admin.certificate_of_residency.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Certificate Of Residency</span>
                </a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/business_permit_clearance') || request()->is('admin/business_permit_clearance/*') ? 'active' : '' }}" href="{{ route("admin.business_permit_clearance.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Business Permit Clearance</span>
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/barangay_health_certificate') || request()->is('admin/barangay_health_certificate/*') ? 'active' : '' }}" href="{{ route("admin.barangay_health_certificate.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Barangay Health Certificate</span>
                </a>
              </li>
    

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/barangay_indigency') || request()->is('admin/barangay_indigency/*') ? 'active' : '' }}" href="{{ route("admin.barangay_indigency.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Barangay Indigency</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/appointments') || request()->is('admin/appointments/*') ? 'active' : '' }}" href="{{ route("admin.appointments.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Appointments</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/announcements') || request()->is('admin/announcements/*') ? 'active' : '' }}" href="{{ route("admin.announcements.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Announcements</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/borrow') || request()->is('admin/borrow/*') ? 'active' : '' }}" href="{{ route("admin.borrow.index") }}">
                  <i class="far fa-list-alt fa-lg "></i>
                  <span class="nav-link-text text-uppercase">Manage Borrow</span>
                </a>
              </li> -->

           

              
          </ul>


        </div>

      </div>
    </div>
  </nav>