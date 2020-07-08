<?php $this->load->view('theme/partials/filecss'); ?>
<body>
  <div id="wrapper">
    <div id="content">
      <?php $this->load->view('theme/partials/nav'); ?>
      <div class="container" id="checkout-page">
        <div class="row steps">
            <div class="col-sm-4 step step-bg-ok">
                <img src="<?=base_url()?>assets/imgs/ok.png" alt="Ok"> Your order        </div>
            <div class="col-sm-4 step step-bg-ok">
                <img src="<?=base_url()?>assets/imgs/ok.png" alt="Ok"> Method of payment        </div>
            <div class="col-sm-4 step step-bg-not-ok">
                <img src="<?=base_url()?>assets/imgs/no.png" alt="Ok"> Successful procurement        </div>
        </div>
        <div class="row">
            <div class="col-sm-9 left-side">
                <form id="goOrder">
                    <div class="title alone">
                        <span>Reservasi</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-products">
                            <thead>
                                <tr>
                                    <th>Paket</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Tambahan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="relative">
                                        <img class="product-image" src="<?=base_url()?>uploads/paket/kk1.png" alt="">
                                        <a href="#" class="btn btn-xs btn-danger remove-product">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                    <td><a href="#"></a></td>
                                    <td>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total</td>
                                    <td>
                                        <span class="final-amount">0</span>                                        <input type="hidden" class="final-amount" name="final_amount" value="2,000,000.00">
                                        <input type="hidden" name="amount_currency" value="€">
                                        <input type="hidden" name="discountAmount" value="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
                <div>
                    <a href="#" class="btn btn-primary go-shop">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span>Back to shop
                    </a>
                    <a href="javascript:void(0);" class="go-order btn btn-primary">
                        Make Order 
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="filter-sidebar">
                    <div class="title">
                        <span>Reservasi Terbanyak</span>
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    <?php $this->load->view('theme/partials/footer'); ?>