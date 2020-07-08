<footer>
  <div class="footer" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 f-col">
          <h3>About Us</h3>
          <p>Belle studio merupakan perusahaan yang bergerak dibidang photography</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 f-col">
          <h3>Pages</h3>
          <ul>
            <li><a href="<?=site_url()?>">» Home </a></li>
            <li><a href="<?=site_url()?>contacts">» Contacts </a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 f-col">
          <h3>Categories</h3>
          <ul>
            <li>
              <a
                href="javascript:void(0);"
                data-categorie-id="1"
                class="go-category"
                >Package</a
              >
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 f-col">
          <h3>Contacts</h3>
          <ul class="footer-icon">
            <li>
              <span class="pull-left"><i class="fa fa-envelope"></i></span>
              <span class="pull-left f-cont-info"
                ><a href="#">info@bellestudio.com</a></span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <p class="pull-left">
        Powered by Belle Studio &copy; All right reserved.
      </p>
      <div class="pull-right">
        <ul class="nav nav-pills payments">
          <li><i class="fa fa-cc-visa"></i></li>
          <li><i class="fa fa-cc-mastercard"></i></li>
          <li><i class="fa fa-cc-amex"></i></li>
          <li><i class="fa fa-cc-paypal"></i></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>
    </div>
    <div id="notificator" class="alert"></div>
    <?php $this->load->view('theme/partials/filejs') ?>
  