<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == 'events' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Halaman Utama</span>
        </a>
    </li>
    <br>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'events' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
          <i class="fas fa-calendar-alt"></i>
            <span>Events</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo site_url('admin/events') ?>">Daftar Kegiatan</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/participants') ?>">Peserta</a>
        </div>
        
    </li>

    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'notes' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
           <i class="fas fa-sticky-note"></i>
            <span>Notes</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/notes') ?>">List Note</a>
        </div>
    </li> -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'notes' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/notes') ?>">
            <i class="fas fa-sticky-note"></i>
            <span>Catatan</span>
        </a>
    </li>

    <!--  <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'topics' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
           <i class="fas fa-align-justify"></i>
            <span>Topics</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/topics') ?>">List Topic</a>
        </div>
    </li> -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'topics' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/topics') ?>">
            <i class="fas fa-align-justify"></i>
            <span>Topik</span>
        </a>
    </li>

     <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'rooms' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
           <i class="fas fa-building"></i>
            <span>Rooms</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/rooms') ?>">List Room</a>
        </div>
    </li> -->
    <li class="nav-item <?php echo $this->uri->segment(2) == 'rooms' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/rooms') ?>">
            <i class="fas fa-building"></i>
            <span>Ruangan</span>
        </a>
    </li>

   </ul>
