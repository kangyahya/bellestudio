<?php $this->load->view('theme/partials/filecss'); ?>
  <body>
    <div id="wrapper">
      <div id="content">
        <?php $this->load->view('theme/partials/nav'); ?>
        <div class="container" id="home-page">
          <div class="row">
            <div class="col-md-3">
              <div class="filter-sidebar">
                <div class="title">
                  <span>Kategori</span>
                </div>
                <a
                  href="javascript:void(0)"
                  id="show-xs-nav"
                  class="visible-xs visible-sm"
                >
                  <span class="show-sp"
                    >Show categories<i
                      class="fa fa-arrow-circle-o-down"
                      aria-hidden="true"
                    ></i
                  ></span>
                  <span class="hidde-sp"
                    >Hide categories<i
                      class="fa fa-arrow-circle-o-up"
                      aria-hidden="true"
                    ></i
                  ></span>
                </a>
                <div id="nav-categories">
                  <ul class="parent">
                    <?php foreach($kategori as $row): ?>
                    <li>
                      <i class="fa fa-circle-o" aria-hidden="true"></i>
                      <a
                        href="javascript:void(0);"
                        data-id_kategori="<?=$row->id?>"
                        class="go-category left-side"
                      >
                        <?=$row->name?>
                      </a>
                    </li>
                    <?php endforeach ?>
                  </ul>
                </div>
              </div>
              <div class="filter-sidebar">
                <div class="title">
                  <span>Order</span>
                </div>
                <div class="oaerror info">
                  <strong>Promo</strong> - Upgrade your account for get discount 10%
                </div>
              </div>
            </div>
            <div class="col-md-9 eqHeight" id="products-side">
              <div class="alone title">
                <span>Paket</span>
              </div>
              <?php
                if (!empty($paket)) {
                    foreach($paket as $pkt){ ?>
                  <div class="product-list col-sm-4 col-md-3">
                <div class="inner">
                  <div class="img-container">
                    <a href="<?=base_url('paket/'.$pkt->uid)?>">
                      <img
                        src="<?=base_url()?>uploads/paket/<?=$pkt->image?>"
                        alt="Pre-wedding Indoor"
                      />
                    </a>
                  </div>
                  <h2>
                    <a href="<?=base_url('paket/'.$pkt->uid)?>"
                      ><?=$pkt->paket?></a
                    >
                  </h2>
                  <div class="price">
                    <span class="underline"
                      >Price: <span><?=($this->session->userdata('logged')?$pkt->harga - ($pkt->harga * 0.1):$pkt->harga)?></span></span
                    >
                    <?=($this->session->userdata('logged')?"<span class='price-down'>10%</span>":"")?>
                  </div>
                  <?php if($this->session->userdata('logged')): ?>
                  <div class="price-discount">
                    Before: <span><?=$pkt->harga?></span>
                  </div>
                  <?php endif ?>
                  <div class="add-to-cart">
                    <a
                      href="javascript:void(0);"
                      class="add-to-cart btn-add"
                      data-goto="<?=base_url()?>shopping-cart"
                      data-id="<?=$pkt->id?>"
                    >
                      <img
                        class="loader"
                        src="<?=base_url()?>assets/imgs/ajax-loader.gif"
                        alt="Loding"
                      />
                      <span class="text-to-bg">Add to shopping cart</span>
                    </a>
                  </div>
                  <div class="add-to-cart">
                    <a
                      href="javascript:void(0);"
                      class="add-to-cart btn-add more-blue"
                      data-goto="<?=base_url()?>checkout"
                      data-id="<?=$pkt->id?>"
                    >
                      <img
                        class="loader"
                        src="<?=base_url()?>assets/imgs/ajax-loader.gif"
                        alt="Loding"
                      />
                      <span class="text-to-bg">Reservation now</span>
                    </a>
                  </div>
                </div>
              </div>
                    <?php }
                } else {
                    ?>
                    <script>
                        $(document).ready(function () {
                            ShowNotificator('alert-info', '<?= lang('no_results') ?>');
                        });
                    </script>
                    <?php
                }
                ?>
            </div>
          </div>
        </div>
        <?php $this->load->view('theme/partials/footer'); ?>
      