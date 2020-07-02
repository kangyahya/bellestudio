<?php $this->load->view('theme/partials/filecss') ?>
<body>
    <?php $this->load->view('theme/partials/nav') ?>
<!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <h1 class="my-4">Registerasi Member</h1>
        <form id="formRegister" method="post" action="">
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nohp" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nohp" placeholder="ex: +6289656xxxx" name="phone" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" name="username" required>
              <div id="msg"></div>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
              <div class="text-right">Sudah Punya Akun ? <a href="<?=site_url('login')?>" class="btn btn-primary">Login</a> </div>
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
<script type="text/javascript">
	$(document).ready(function() {
		$("#username").on("input", function(e) {
			$('#msg').hide();
			if ($('#username').val() == null || $('#username').val() == "") {
				$('#msg').show();
				$("#msg").html("Username is required field.").css("color", "red");
			} else {
				$.ajax({
					type: "POST",
					url: "<?=site_url()?>member/get_username_availability",
					data: $('#formRegister').serialize(),
					dataType: "html",
					cache: false,
					success: function(msg) {
						$('#msg').show();
						$("#msg").html(msg);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$('#msg').show();
						$("#msg").html(textStatus + " " + errorThrown);
					}
				});
			}
    });
	});
</script>