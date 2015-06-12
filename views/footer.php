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
	</body>
</html>