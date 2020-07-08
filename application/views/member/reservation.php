<?php $this->load->view('theme/partials/filecss') ?>
<body>
    <?php $this->load->view('theme/partials/nav') ?>
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-md-12 eqHeight">
        <div class="alone title">
                <span>Products</span>
        </div>
        <form id="formRegister" method="post" action="">
          <h1 class="my-4">Paket</h1>
          <div class="form-group row">
            <label for="paket" class="col-sm-2 col-form-label">Paket</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="member" placeholder="member" name="uid_member" value="<?=$member->uid?>" required>
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
          <h1 class="my-4">Tambahan</h1>
          <div class="form-group row">
            <div class="col-md-12">
              <a href="#add" class="btn btn-primary">Tambah</a>
              <table class="table table-highlight my-2 text-center">
                <tr>
                  <thead>
                    <th width="20px">No.</th>
                    <th>Tambahan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </thead>
                </tr>
              </table>
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
