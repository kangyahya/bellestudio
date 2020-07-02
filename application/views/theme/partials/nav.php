<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary text-white fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Belle Studio</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url()?>"><i class="fa fa-home"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
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