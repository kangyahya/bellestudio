<?php $this->load->view('theme/partials/filecss') ?>
<body>
    <?php $this->load->view('theme/partials/nav') ?>
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-12">
        <h1 class="my-4">Reservation</h1>
        <form id="formRegister" method="post" action="">
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="member" placeholder="member" name="uid_member" value="<?=$member->uid?>" required>
              <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="<?=$member->nama?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="<?=$member->alamat?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?=$member->email?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nohp" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nohp" placeholder="ex: +6289656xxxx" name="phone" value="<?=$member->nohp?>" required>
            </div>
          </div>
          <h1 class="my-4">Paket</h1>
          <div class="form-group row">
            <label for="paket" class="col-sm-2 col-form-label">Paket</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="uid" placeholder="uid" name="uid_paket" value="<?=$paket->uid?>" required>
              <input type="text" class="form-control" id="paket" placeholder="paket" name="paket" value="<?=$paket->paket?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="tanggal" placeholder="paket" name="tanggal" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="jam" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="time" class="form-control" id="jam" placeholder="jam" name="jam" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Tambahan</div>
            <div class="col-sm-10">
              <div class="form-check">
                <?php foreach($tambahan as $row): ?>
                <div class="row">
                  <input class="form-check-input" type="checkbox" id="gridCheck<?=$row->id?>" name="add<?=$row->id?>" value="<?=$row->harga?>">
                  <label class="form-check-label" for="gridCheck<?=$row->id?>">
                    <?=$row->tambahan." ( Rp. ".number_format($row->harga,2,',',',')." ) "?>
                  </label>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <?php $this->load->view('theme/partials/footer') ?>
</body>
<?php $this->load->view('theme/partials/filejs') ?>