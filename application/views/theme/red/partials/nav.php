<!-- Navigation -->
  <nav class="navbar gradient-color bg-primary">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav" style="margin-left:-15px;">
          <li class="active">
            <a href="<?=site_url()?>"><i class="fa fa-home"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="#">About</a>
          </li>
          <li class="dropdown">
            <?php if($this->session->userdata('logged')=="logged"):?>
            <a class="dropdown-toggle nav-link" href="#" id="navbarAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?=$this->session->userdata('nama')?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarAccount">
              <a class="dropdown-item" href="<?=site_url('login')?>">Profile</a>
              <a class="dropdown-item" href="<?=site_url('reservation')?>">Reservation</a>
              <a class="dropdown-item" href="#">Settings</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?=site_url('member/logout')?>">Logout</a>
            </div>
          <!-- user login dropdown end -->
            <?php else: ?>
            <a class="dropdown-toggle nav-link" href="#" id="navbarAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarAccount">
              <a class="dropdown-item" href="<?=site_url('login')?>">Login</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?=site_url('register')?>">Register</a>
            </div>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-question-circle"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>