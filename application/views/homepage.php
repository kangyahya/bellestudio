<?php $this->load->view('theme/partials/filecss') ?>
<body>
    <?php $this->load->view('theme/partials/nav') ?>
<!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="row my-4">
        <?php foreach($paket as $pkt): ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#detail<?=$pkt->id?>" data-toggle="modal"><img class="card-img-top" src="<?=base_url('uploads/paket/').$pkt->image?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title text-center">
                  <a href="#detail<?=$pkt->id?>" data-toggle="modal"><?=$pkt->paket?></a>
                </h4>
                <h5 class="text-center">Rp. <?=number_format($pkt->harga,2,',','.')?></h5>
              </div>
              <div class="card-footer text-center">
                <small class="text-muted"><button class="btn btn-info">Periksa Jadwal</button></small>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>
        <!-- /.row -->
        
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <?php $this->load->view('theme/partials/footer') ?>
  <?php foreach($paket as $pkt): ?>
  <form action="<?=site_url('reservation/'.$pkt->uid)?>" method="post">
        <div class="modal fade" id="detail<?=$pkt->id?>" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h5 class="modal-title">Detail Paket</h5>                   
                    </div>
                    <div class="modal-body">
                        <!--1-->
                        <div class="row">
                            <div class="col-md-4">
                                <img class="card-img-top" src="<?=base_url('uploads/paket/').$pkt->image?>" alt="">
                            </div>
                            <div class="col-md-8">
                              <ul class="list-unstyled">
                                <li><strong>Rp. <?=number_format($pkt->harga,2,',','.')?></strong></li>
                                <li>Included : 
                                  <ul>
                                    <?php $query = $this->db->get_where('tbl_detail_paket',['uid_paket'=>$pkt->uid]);
                                    if($query->num_rows() > 0){
                                      foreach($query->result() as $row){
                                        echo "<li><u>".$row->included."<br></u></li>";
                                      }
                                    }else{
                                      echo "not yet";
                                    }
                                    ?>
                                  </ul>
                                </li>
                                <li style="border:solid 1px black">Notes :
                                  <ul>
                                    <?php $query = $this->db->get_where('tbl_note',['uid_paket'=>$pkt->uid]);
                                    if($query->num_rows() > 0){
                                      foreach($query->result() as $row){
                                        echo "<li><u>".$row->note."<br></u></li>";
                                      }
                                    }else{
                                      echo "tidak ada catatan";
                                    }
                                    ?>
                                  </ul>
                                </li>
                              </ul>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
                    <p style="text-align:center;float:center;">
                    <button type="button" class="btn btn-primary btn-sm" <?=($this->session->userdata('logged')=='logged')?'':'disabled'?> onclick="window.location.href='<?=site_url('reservation/'.$pkt->uid)?>'">Reservation</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button></p>
                    </div>
                </div>
            </div>
        </div>
      </form>
  <?php endforeach; ?>
</body>
<?php $this->load->view('theme/partials/filejs') ?>