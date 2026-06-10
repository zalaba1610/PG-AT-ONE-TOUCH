 <div class="modal-dialog modal-dialog-centered" role="document" style="margin-left: 373px;">
            <div class="modal-content">
                
                <div class="modal-body space-y-20 pd-40">
                    <div class="wrap-modal flex">
                        <div class="images flex-none">
                            <img src="assets/images/section/login2.jpg"  alt="images" style="
    height: 543px;
    width: 400px;
">
                           
                        </div>
                        <div class="content">
                            <div class="title-login fs-30 fw-7 lh-45">User Sign In</div>
                            <div class="comments">
                                <div class="respond-comment">
                                    <form method="post" class="comment-form form-submit" enctype="multipart/form-data"  accept-charset="utf-8">
                                        <fieldset class="">
                                            <label class="fw-6">User Name</label>
                                            <input type="text"  class="tb-my-input" name="ucontact" placeholder="Contact number" maxlength="10" pattern="[0-9]{10}" title="Ex.9876543210"  required >
                                            <img class="img-icon img-email" src="assets/images/icon/icon-gmail.svg" alt="images">
                                        </fieldset>   
                                        <fieldset class="style-wrap">
                                            <label class="fw-6">Password</label>
                                            <input type="password" name="upassword" class="input-form password-input" placeholder="Your password" id="myInput" required>
                                            <img class="img-icon" src="assets/images/icon/icon-password.svg" alt="images">
											<br/><br/><input type="checkbox" onclick="myFunction()"> Show Password
                                        
											<script>
											function myFunction() {
											  var x = document.getElementById("myInput");
											  if (x.type === "password") {
												x.type = "text";
											  } else {
												x.type = "password";
											  }
											}
											</script>
                                        </fieldset> 
                                                                           
                                        <button class="sc-button"  name="sub1" type="submit">
                                            <span>Sign In</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-box text-center fs-13">You don't have account?  <a class="font-2 fw-7 fs-13 color-popup text-color-3"  href="index.php?file=signup">Sign Up</a> | <a href="index.php?file=forgot-password">Forgot Password</a></div>
							
							
							<?php 
				   if(isset($_REQUEST['sub1']))
				   {
					   
					   $username = $_REQUEST['ucontact'];
					   $password = $_REQUEST['upassword'];
					   
					   $sel = "select * from user_tb where u_contact = '$username' and u_password = '$password' and u_status = 'Active'";
					   $r = $con->query($sel);
					   
					   if(mysqli_num_rows($r) > 0)
					   {
                           foreach($r as $v);

                           session_start();
                           
                           $_SESSION['ucontact'] = $username;
                           $_SESSION['img'] = $v['u_image'];
                           $_SESSION['userid'] = $v['u_id'];
                           $_SESSION['username'] = $v['u_name'];
                           $_SESSION['utime'] = $v['u_udate']; 
						   
                          header("location:index.php?file=home");					  
					   }
					   else
					   {
						?>
                  
					 <p class="btn btn-block btn-danger">
						Please Enter Valid Username or Password.!
					  </p>
				   <?php } } ?>	
                           
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    <br/><br/>
	
	
					