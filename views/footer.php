	<div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#" data-toggle="modal" data-target=".pop-up-1">
                             &copy; 2015 Netpoint-Media •
                        </a>              
                        <!--  Modal content for the image -->
                            <div class="modal fade pop-up-1" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                          <div class="modal-body">
                                            <?php if (!Session::get('username')):?>
                                                <p style="color:black;">Do you really want to login as admin?</p>
                                             <?php
                                                   else:
                                                    $user = Session::get('username');
                                                   ?>        
                                                <p style="color:black;">Do you really want to log out?</p>
                                            <?php endif;?>
                                          </div>
                                          <div class="modal-footer">
                                              <a class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Cancel</a>
                                              <?php if (!Session::get('username')):?>
                                                <a class="btn btn-primary" href="<?= DIR ?>user/loginForm" >Ok</a>
                                                 <?php
                                                   else:
                                                    $user = Session::get('username');
                                                   ?>        
                                                 <a class="btn btn-primary" href="<?= DIR ?>user/logout" >Ok</a>
                                                <?php endif;?>
                                          </div>
                                      </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal image -->
                    </div>
                </div>
            </div>
        </div>

		</div> <!-- / .container -->
		<script src="<?= URL::SCRIPTS('jquery-2.0.3.min') ?>"></script>
		<script src="<?= URL::SCRIPTS('jquery') ?>"></script>
		<script src="<?= URL::SCRIPTS('bootstrap.min') ?>"></script>
    <script type="text/javascript">
      setInterval(function() {
        $.ajax({ url: '/testkap/connect',
           type: 'get',
           success: function(output) {
              var table = output.split("-");
              $(".cf").html("<p style='color: #ff0000'> "+ table[0] +" </p>");
              $(".ga").html("<p style='color: #ff0000'> "+ table[1] +" </p>");
              $(".gl").html("<p style='color: #ff0000'> "+ table[2] +" </p>");
              $(".ir").html("<p style='color: #ff0000'> "+ table[3] +" </p>");
              $(".kv").html("<p style='color: #ff0000'> "+ table[4] +" </p>");
              $(".kw").html("<p style='color: #ff0000'> "+ table[5] +" </p>");
              $(".tc").html("<p style='color: #ff0000'> "+ table[6] +" </p>");

              console.log(output);
              console.log("done");
             }
          });
      }, 10000); //10 seconds
    </script>
	</body>
</html>