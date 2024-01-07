<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Richard V.Welsh</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">Manager</small>
                <span class="status-indicator online"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </li>
    -------- ADMIN --------
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Standar</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/periode_index">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Periode</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/unit_index">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Unit</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/unitaudit_index">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Unit Audit</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Putusan Audit</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">User</span>
      </a>
    </li>
    -------- AUDITOR --------
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Standar</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Unit Audit</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Tim Auditor</span>
      </a>
    </li>
    <li class="nav-item  ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Proses Audit</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="/">Submisi {{-- (subklausul & file upload) --}}</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">Analisa</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">Temuan</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item  ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Proses Pasca Audit</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="/">Submisi lanjutan {{-- (respon temuan & file upload lanjutan) --}}</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">Analisa Lanjutan</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Finalisasi Audit</span>
      </a>
    </li>


    -------- AUDITEE --------
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Panduan</span>
      </a>
    </li>
    <li class="nav-item  ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Proses Audit</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="/">Submisi {{-- (plus dikasi liat analisa kalo dah dibuat) --}}</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item  ">
      <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="" aria-controls="basic-ui">
        <i class="menu-icon mdi mdi-dna"></i>
        <span class="menu-title">Proses Pasca Audit</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse " id="basic-ui">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item ">
            <a class="nav-link" href="/">Temuan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">Respon Temuan</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/">Submisi Lanjutan {{-- (plus dikasi liat analisa lanjutan kalo dah dibuat) --}}</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Pembayaran</span>
      </a>
    </li>
    <li class="nav-item"> 
      <a class="nav-link" href="/">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Hasil Audit</span>
      </a>
    </li>
  </ul>
</nav>