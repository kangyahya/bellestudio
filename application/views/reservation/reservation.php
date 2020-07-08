<?php $this->load->view('theme/partials/filecss'); ?>
<body>
  <div id="wrapper">
    <div id="content">
      <?php $this->load->view('theme/partials/nav'); ?>
      <div class="container" id="shopping-cart">
    <h1>Shopping Cart</h1>
    <hr>
        <div class="row steps">
        <div class="col-sm-4 step step-bg-ok">
            <img src="<?=base_url()?>assets/imgs/ok.png" alt="Ok"> Your order        </div>
        <div class="col-sm-4 step step-bg-not-ok">
            <img src="<?=base_url()?>assets/imgs/no.png" alt="Ok"> Method of payment        </div>
        <div class="col-sm-4 step step-bg-not-ok">
            <img src="<?=base_url()?>assets/imgs/no.png" alt="Ok"> Successful procurement        </div>
    </div>
            <div class="table-responsive">
            <table class="table table-bordered table-products">
                <thead>
                    <tr>
                        <th>Paket</th>
                        <th>Name</th>
                        <th>Harga</th>
                        <th>Tambahan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                                            <tr>
                            <td class="relative">
                                <input type="hidden" name="uid[]" value="<?=$paket->uid?>">
                                <img class="product-image" src="<?=base_url()?>uploads/paket/<?=$paket->image?>" alt="">
                                <a href="<?=site_url()?>home/removeFromCart?delete-product=5&back-to=shopping-cart" class="btn btn-xs btn-danger remove-product">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </a>
                            </td>
                            <td><a href="<?=site_url('paket/'.$paket->uid)?>"><?=$paket->paket?></a></td>
                            
                            <td><?=number_format($paket->harga,2,',','.')?></td>
                            <td><br>
                                <?php
                                $tot = $paket->harga;
                                 if(!empty($tambahan)): $no =0; 
                                 foreach($tambahan as $tambah):
                                 ?>

                                    <input for="check<?php echo $no?>" type="checkbox" id="check<?php echo $no?>" class="check" name="tambahan[<?=$tambah->id?>]" value="<?=$tambah->uid?>" data-id<?=$no?>='<?=$tambah->uid?>' data-harga<?=$no?>='<?=$tambah->harga?>' data-harga_paket = '<?=$paket->harga?>'
                                    <?php foreach($temporary->result() as $tmp):
                                        if($tambah->uid==$tmp->uid_tambahan){
                                            echo "checked='checked'";
                                        }
                                        endforeach?>
                                    >
                                    <label id="check<?php echo $no?>"><?=$tambah->tambahan." ( ".$tambah->harga." )"?></label><br>
                                <?php $no++; endforeach;  endif;?>
                            </td>
                            <td>
                                <?=number_format($paket->harga,2,',','.')?>
                                <?php if(!empty($temporary)): $noo =0; foreach($temporary->result() as $tambah):?>
                                    <div id="tambahan<?=$noo?>"><?=$tambah->harga?></div>
                                    <?php $tot = $tot + $tambah->harga ?>
                                <?php $noo++; endforeach;  endif;?>
                                
                            </td>
                        </tr>
                                        <tr>
                        <td colspan="4" class="text-right">Final sum</td>
                        <td><div id="finalsum"><?=number_format($tot,2,',','.')?></div></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="<?=base_url('paket/'.$paket->uid)?>" class="btn btn-primary go-shop">
            <span class="glyphicon glyphicon-circle-arrow-left"></span>
            Back to shop        </a>
        <a href="javascript:void(0);" class="go-checkout btn btn-primary " data-id="<?=$paket->uid?>" data-gocheckout="<?=site_url('checkout')?>">
            Checkout 
            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
        </a>
    </div>
    <script src="<?=base_url()?>assets/js/image-preveiw.js"></script>
    <script>
        $(document).ready(function(){
            $('.check').on("click", function(){
                var id = $(this).attr("id");
                var id2 = id.substr(id.length -1);
                var id_paket = $(this).data("id"+id2);
                var reload = true;
                if($(this).is(":checked")){
                    $.ajax({
                        method:'POST',
                        url:"<?=site_url('member/sendtambahan')?>",
                        data: {id:id_paket},
                    }).done(function(data){
                        if(reload==true){
                            location.reload(true);
                            return true;
                        }else if(typeof reload == "string"){
                            location.href= reload;
                            return;
                        }
                        ShowNotificator("alert-info", "berhasil ditambahkan");
                    }).fail(function(err){
                        ShowNotificator("alert-danger", "gagal ditambahkan");
                    });
                }else{
                    $.ajax({
                        method:'POST',
                        url:"<?=site_url('member/hapustambahan')?>",
                        data: {id:id_paket},
                    }).done(function(data){
                        if(reload==true){
                            location.reload(true);
                            return;
                        }else if(typeof reload == "string"){
                            location.href= reload;
                            return;
                        }
                        ShowNotificator("alert-info", "berhasil dihapus");
                    }).fail(function(err){
                        ShowNotificator("alert-danger", "failed");
                    });
                }
                
            });
            $('a.go-checkout').click(function(){
                const id_paket = $(this).data("id");
                var goto_sit = $(this).data("gocheckout");
                let reload = false;
                if($(this).hasClass('refresh-me')){
                    reload = true;
                }else if(goto_sit != null){
                    reload = goto_sit;
                }
                manageCheckout("add", id_paket, reload);
            });
        });
        function manageCheckout(action, id_paket, reload){
            var action_error_msg = "Oops! ada kesalahan";
            if(action == "add"){
                var action_success_msg = "Yeah, Berhasil";
            }
            $.ajax({
                method : 'POST',
                url : "<?=site_url('member/manageCheckout')?>",
                data : {id_paket : id_paket}
            }).done(function(data){
                if (reload == true) {
				location.reload(false);
				return;
			} else if (typeof reload == "string") {
				location.href = reload;
				return;
			}
			ShowNotificator("alert-info", action_success_msg);
            }).fail(function(err){
                ShowNotificator("alert-danger", action_error_msg);
            }).always(function(){
                if(action == "add"){

                }
            });
        }
    </script>
    <?php $this->load->view('theme/partials/footer'); ?>