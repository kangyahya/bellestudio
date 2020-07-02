<?php $this->load->view('theme/partials/filecss') ?>
<body>
    <?php $this->load->view('theme/partials/nav') ?>
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-12">
        <h1 class="my-4">List Reservation</h1>
        <table id="mytable" class="table table-hover table-bordered">
            <thead>
                <th width='10px' class="text-center">No</th>
                <th class="text-center">Nama Paket</th>
                <th class="text-center">Tambahan</th>
                <th class="text-center">Status</th>
            </thead>
            <tbody>
                <?php $no =1; foreach($list as $row): ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row->paket?></td>
                    <td></td>
                    <td class="text-center"><?=($row->status == 'lunas')?'<span class="badge badge-success">lunas</span>':'<a href="#konfirmasi" data-toggle="modal" class="btn btn-primary">Konfirmasi</a> <span class="badge badge-secondary">pending</span>'?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <?php $this->load->view('theme/partials/footer') ?>
</body>
<?php $this->load->view('theme/partials/filejs') ?>