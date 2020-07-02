<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>IT Cirebon</title>
  <meta name="description" content="My first PWA"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url()?>assets/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/fonts/material-icons.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/slick/slick.css">
  <meta name="theme-color" content="#00897B"/>
</head>
<body>
  <div class="navbar-fixed">
    <nav role="navigation" class="blue">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo" id="logo-container">Studio</a>
        <a href="#" class="sidenav-trigger" data-target="slide-out">☰</a>
        
        <ul class="right hide-on-med-and-down">
          <li class="active"><a class="waves-effect" href="#home">Home</a></li>
          <li><a  href="#"><i class="material-icons left">shopping_cart</i> Keranjang</a></li>
          <li><a class="dropdown-trigger bottom" href="#!" data-target="dropdown1">My Account<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
        
        <!-- Navigasi -->
        <ul id="dropdown1" class="dropdown-content nested">
          <li><a href="#!">Login</a></li>
          <li class="divider"></li>
          <li><a href="#!">Register</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="<?=base_url()?>assets/web/images/office.jpg">
      </div>
      <a href="#user"><img class="circle" src="<?=base_url()?>assets/web/images/yuna.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">home</i>Home</a></li>
    <li><a href="#!"><i class="material-icons">shopping_cart</i>Keranjang</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <!-- Akhir Navigasi -->
  <div class="container">
    <div class="col s-12">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col l3 m6">
          <h4>Belle Studio</h4>
        </div>
        <div class="col l9 m12">
          <div class="row">
              <div id="carouselFirst" class="carousel carousel-slider center" role="listbox">
                <a class="carousel-item" href="#one!">
                    <img src="<?=base_url('assets/web/images/1.jpg')?>">
                </a>
                <a class="carousel-item" href="#two!">
                    <img src="<?=base_url('assets/web/images/2.jpg')?>">
                </a>
                <a class="carousel-item" href="#three!">
                    <img src="<?=base_url('assets/web/images/3.jpg')?>">
                </a>
                
              </div>
          </div>
          <div class="row">
            <div id="services"></div>
          </div>
        </div>
      </div>
      
    </div>

  </div>

  <div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">message</i>
  </a>
</div>
  <script src="<?=base_url()?>assets/web/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/materialize/js/materialize.min.js"></script>
  <script src="<?=base_url()?>assets/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>assets/js/api.js"></script>
  <script type="text/javascript">
    // document.addEventListener("DOMContentLoaded", function() {
    //   // Activate sidebar nav
    //   var elems = document.querySelectorAll(".sidenav");
    //   M.Sidenav.init(elems);
    // });
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.fixed-action-btn').floatingActionButton();
      $('.dropdown-trigger').dropdown({
        belowOrigin : true
      });
      $('.carousel.carousel-slider').carousel({
        fullWidth : true,
        indicators :true
      });

    });
  </script>
</body>
</html>