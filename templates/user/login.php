<?php include('templates/main.php');

  if (isset($_SESSION['access_token']) || isset($_SESSION['ownUserData'])) {
    header('Location: ' . BASE_URL . '/UserController/profile');
  }
  global $helper;
  $redirectUrl = "http://localhost/sj-mvc/UserController/loginWithFB";
  $permissions = ['email'];
  $loginUrl    = $helper->getLoginUrl($redirectUrl, $permissions);
?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-8">
      <h2>Login</h2>
      <hr>
      <form action="<?php echo BASE_URL; ?>/UserController/login" method="POST" >
        <div class="form-group">
          <label for="exampleInputEmail1"><strong>Email address</strong></label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1"><strong>Password</strong></label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
    <div class="col-md-1 d-flex justify-content-center  align-items-center">
      <h3>Or</h3>
    </div>
    <div class="col-md-3 d-flex justify-content-center  align-items-center">
      <button class="btn btn-info btn-design" onclick="window.location = '<?php echo $loginUrl; ?>'">Login with Facebook</button>
    </div>
  </div>
</div>