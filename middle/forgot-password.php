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
                            <div class="title-login fs-30 fw-7 lh-45">Forgot Password</div>
                            <div class="comments">
                                <div class="respond-comment">
                                    <form method="post" class="comment-form form-submit" enctype="multipart/form-data"  accept-charset="utf-8">
                                        <fieldset class="">
                                            <label class="fw-6">Enter Your Contact</label>
                                            <input type="text"  class="tb-my-input" name="f_phone" <?php if(isset($_REQUEST['form_botcheck']))
				   {?>value="<?php echo $_REQUEST['f_phone']; ?>" <?php } ?> placeholder="Contact number" maxlength="10" pattern="[0-9]{10}" title="Ex.9876543210"  required >
                                            <img class="img-icon img-email" src="assets/images/icon/icon-gmail.svg" alt="images">
                                        </fieldset> 
                                              <button class="sc-button"  name="form_botcheck" type="submit">
                                            <span>Submit</span>
                                        </button>	
										  <?php 
										   if(isset($_REQUEST['form_botcheck']))
										   {
											   
											   $contact = $_REQUEST['f_phone'];
											  
											   
											   $sel = "select * from user_tb where u_contact = '$contact' and  u_status = 'Active'";
											   $r = $con->query($sel);
											   
											   if(mysqli_num_rows($r) > 0)
											   {
												   foreach($r as $v);

												 
												   $contact = $v['u_contact'];
												   $password = $v['u_password'];
												   
												  ?>

                                           <fieldset class="">
                                            <label class="fw-6">Your Password</label>
                                            <input type="text"  class="tb-my-input" value="<?php echo $password; ?>" name="f_psw" placeholder="Password" >
                                            <img class="img-icon img-email" src="assets/images/icon/icon-gmail.svg" alt="images">
                                        </fieldset> 
                                             <?php								
					   }
					   else
					   {
						?>
					
      <p class="btn btn-block btn-danger">
        Please Enter Valid Contact Number.!
      </p>
	  <?php } } ?>										
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="text-box text-center fs-13">You Have Already Account ? <a class="font-2 fw-7 fs-13 color-popup text-color-3"  href="index.php?file=signin">Sign In</a></div>
							
                  
					       
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    <br/><br/>
	
	
					