<br>
<div style="margin-top:100px;">     
  <div class="container">
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
      <form class="form-signin" role="form" action="<?= DIR ?>user/login" method="POST">
        <center><h2 class="form-signin-heading">Anmelden</h2></center>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" class="form-control" name="username"  placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" name="password"  placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Anmelden bleiben
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
      </form>
     </div>
     <div class="col-md-4">
      </div>
    </div>
  </div> <!-- /container -->
</div>