<?php $this->load->view('theme/partials/filecss'); ?>
<body>
  <div id="wrapper">
    <div id="content">
      <?php $this->load->view('theme/partials/nav'); ?>
      <div class="container" id="view-product">
        <div class="row">
          <div class="col-sm-4">
            <div style="margin-bottom: 20px;">
              <img
                src="<?=base_url('uploads/paket/'.$paket->image)?>"
                style="width: auto; height: auto;"
                data-num="0"
                class="other-img-preview img-responsive img-sl the-image"
                alt="Pre-wedding"
              />
            </div>
            <div class="row"></div>
          </div>

          <div class="col-sm-8">
            <h1><?=$paket->paket?></h1>
            <div class="row row-info">
              <div class="col-sm-6"><b>Harga:</b></div>
              <div class="col-sm-6">Rp. <?=number_format($paket->harga,2,',','.')?></div>
              <div class="col-sm-12 border-bottom"></div>
            </div>
            <div class="row row-info">
              <div class="col-sm-6"><b>Termasuk:</b></div>
              <div class="col-sm-6">
                  <?php $query = $this->db->get_where('tbl_detail_paket',['uid_paket'=>$paket->uid]);
                  if($query->num_rows()>0){
                      foreach($query->result() as $row):
                        echo "<span class='fa fa-arrow-right' style='color:red'></span> ".$row->included."<br>";
                      endforeach;
                  }else{
                    echo "empty";
                  }?>
              </div>
              <div class="col-sm-12 border-bottom"></div>
            </div>
            <div class="row row-info">
              <div class="col-sm-6"><b>Catatan:</b></div>
              <div class="col-sm-6">
                <?php
                if($notes->num_rows()>0):
                    foreach($notes->result() as $note):
                    echo $note->note ." biaya tambahan ". $note->harga;
                    endforeach;
                else:
                    echo "Tidak ada catatan";
                endif;
                ?>
              </div>
              <div class="col-sm-12 border-bottom"></div>
            </div>
            <div class="row row-info">
              <div class="col-sm-6"><b>Kategori:</b></div>
              <div class="col-sm-6">
                <a
                  href="javascript:void(0);"
                  class="go-category btn-blue-round"
                  data-id_kategori="<?=$paket->id_kategori?>"
                >
                  <?=$kategori->name?>
                </a>
              </div>
              <div class="col-sm-12 border-bottom"></div>
            </div>
            <div class="row row-info">
              <div class="col-sm-6"></div>
              <div class="col-sm-6 manage-buttons">
                <a
                  href="javascript:void(0);"
                  data-id="<?=$paket->uid?>"
                  data-goto="<?=site_url()?>checkout"
                  class="add-to-cart btn-add"
                >
                  <span class="text-to-bg">Reservasi sekarang</span>
                </a>
                <a
                  href="javascript:void(0);"
                  data-id="<?=$paket->uid?>"
                  data-goto="<?=site_url()?>/reservation"
                  class="add-to-cart btn-add"
                >
                  <span class="text-to-bg">Tambahkan ke ranjang</span>
                </a>
              </div>
              <div class="col-sm-12 border-bottom"></div>
            </div>
            <div class="row row-info">
              <div class="col-xs-12"><b>Ringkasan:</b></div>
            </div>
            <div id="description">
              <p><?=($paket->description==null)?'tidak ada deskripsi':$paket->description?></p>
            </div>
          </div>
        </div>
        <div class="row orders-from-category" id="products-side">
          <div class="filter-sidebar">
            <div class="title">
              <span>Artikel lain dari kategori ini</span>
            </div>
          </div>
          <?php
                if (!empty($paket_kategori)) {
                    foreach($paket_kategori as $pkt){ ?>
                  <div class="product-list col-sm-4 col-md-3">
                <div class="inner">
                  <div class="img-container">
                    <a href="<?=base_url('reservation/'.$pkt->uid)?>">
                      <img
                        src="<?=base_url()?>uploads/paket/<?=$pkt->image?>"
                        alt="Pre-wedding Indoor"
                      />
                    </a>
                  </div>
                  <h2>
                    <a href="<?=base_url('reservation/'.$pkt->uid)?>"
                      ><?=$pkt->paket?></a
                    >
                  </h2>
                  <div class="price">
                    <span class="underline"
                      >Harga: <span><?=($this->session->userdata('logged')?$pkt->harga - ($pkt->harga * 0.1):$pkt->harga)?></span></span
                    >
                    <?=($this->session->userdata('logged')?"<span class='price-down'>10%</span>":"")?>
                  </div>
                  <?php if($this->session->userdata('logged')): ?>
                  <div class="price-discount">
                    Harga Awal: <span><?=$pkt->harga?></span>
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
                      <span class="text-to-bg">Buy now</span>
                    </a>
                  </div>
                </div>
              </div>
                    <?php }
                } else {
                    ?>
                    <div class="alert alert-info">
            No other products from this category
          </div>
                    <?php
                }
                ?>
          
        </div>
      </div>
      <div id="modalImagePreview" class="modal">
        <div class="image-preview-container">
          <div class="modal-content">
            <div class="inner-prev-container">
              <img id="img01" alt="" />
              <span class="close">&times;</span>
              <span class="img-series"></span>
            </div>
          </div>
          <a href="javascript:void(0);" class="inner-next"></a>
          <a href="javascript:void(0);" class="inner-prev"></a>
        </div>
        <div id="caption"></div>
      </div>
    </div>
    <script src="<?=base_url()?>assets/js/image-preveiw.js"></script>
    <script>
      var variable = {
        clearShoppingCartUrl: "http://localhost/bellestudio/clearShoppingCart",
        manageShoppingCartUrl: "http://localhost/bellestudio/member/manageShoppingCart",
        discountCodeChecker: "http://localhost/bellestudio/discountCodeChecker"
      };
    </script>
    <?php $this->load->view('theme/partials/footer'); ?>
