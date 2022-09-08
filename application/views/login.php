<?php
if ($this->config->item('company_name') !== '') {
  $company_name =  $this->config->item('company_name');
} else {
  $company_name = 'Travel Club';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('assets/frontend/style.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="bg-custom-blue">
  <div class="container-fluid">
    <div class="row" style="height: 100vh;">

      <div class="col-5 d-flex flex-column justify-content-center align-items-center text-white">
        <h4>Lorem, ipsum dolor.</h4>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
      </div>

      <div class="col-7 d-flex flex-column justify-content-center align-items-center my-1 bg-white">
        <div class="row">
          <?php $successMessage = $this->session->flashdata('successmessage');
          $warningmessage = $this->session->flashdata('warningmessage');
          if (isset($successMessage)) {
            echo '<div id="alertmessage" class="col-md-12">
      <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               ' . output($successMessage) . '
              </div>
      </div>';
          }
          if (isset($warningmessage)) {
            echo '<div id="alertmessage" class="col-md-12">
      <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               ' . output($warningmessage) . '
              </div>
      </div>';
          }
          ?>
        </div>
        <img class="img-fluid" src="<?= base_url("assets/Slicing/logo-blue.png") ?>">
        <p class="login-box-msg text-secondary mt-2">Lorem ipsum dolor sit amet consectetur.</p>

        <form action="<?= base_url() . 'login/login_action'; ?>" method="post">
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com">
            <label for="floatingInputGrid">User Name</label>
          </div>
          <div class="form-floating mt-2">
            <input type="password" name="password" class="form-control" id="floatingInputGrid" placeholder="000000">
            <label for="floatingInputGrid">Password</label>
          </div>
          <div class="col-md d-flex justify-content-center align-item-center mt-3">
            <button type="submit" class="btn btn-md bg-custom-blue text-white px-5 text-uppercase btn-block rounded-pill"><b>Log In</b></button>
          </div>
          <p class="mt-4">Don't have an account? <a href="" class="text-custom-blue">Sign Up</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

</html>