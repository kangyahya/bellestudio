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
          <li class="<?=($this->uri->segment(1)=='')?'active':''?>">
            <a href="<?=site_url()?>"><i class="fa fa-home"></i> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li>
            <a href="#">About</a>
          </li>
          <?php if($this->session->userdata('logged')): ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Checkout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$this->session->userdata('logged')?site_url('logout'):site_url('login')?>"><?=$this->session->userdata('logged')?"Logout":"Login"?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?=$this->session->userdata('nama')?></a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('login')?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>