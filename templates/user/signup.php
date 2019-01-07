<?php include('templates/main.php'); ?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-8 offset-md-2">
      <form action="<?php echo BASE_URL; ?>/UserController/signup" method="POST" >
        <div class="form-group">
          <label for="exampleInputName"><strong>Name</strong></label>
          <input type="name" class="form-control" name="name" id="exampleInputName" aria-describedby="NameHelp" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"><strong>Email address</strong></label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1"><strong>Password</strong></label>
          <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputConfirmPassword1"><strong>Confirm Password</strong></label>
          <input type="password" class="form-control" name="confirm_password" id="exampleInputConfirmPassword1" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>