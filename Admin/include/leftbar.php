
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="<?php if($filename == 'home'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=home">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
	  
	  
	    <li class="nav-item">
        <a class="<?php if($filename == 'booking'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bookmark-check"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
		     <?php 
				$acount = "select count(b_id) as BOOKING,b_status as PSTATUS from booking_tb where b_status ='Pending'";
				$acountr = $con->query($acount);
				foreach($acountr as $acountrv);
			?>
		 
            <a href="index.php?file=booking&bookstatus=Pending">
              <i class="bi bi-circle"></i><span>Pending Booking [<?php echo $acountrv['BOOKING']; ?>]</span>
            </a>
          </li>
		  
		  
          <li>
		    <?php 
			$ccount = "select count(b_id) as CBOOKING,b_status as CSTATUS from booking_tb where b_status ='Confirm'";
				$ccountr = $con->query($ccount);
				foreach($ccountr as $ccountrv);
			  ?>
            <a href="index.php?file=booking&bookstatus=Confirm">
              <i class="bi bi-circle"></i><span>Confirm Booking [<?php echo $ccountrv['CBOOKING']; ?>]</span>
            </a>
          </li>
		  
          <li>
		  <?php 
		$bcount = "select count(b_id) as CANBOOKING,b_status as CANSTATUS from booking_tb where b_status ='Cancel'";
		$bcountr = $con->query($bcount);
		foreach($bcountr as $bcountrv);
	  ?>
            <a href="index.php?file=booking&bookstatus=Cancel">
              <i class="bi bi-circle"></i><span>Cancel Booking [<?php echo $bcountrv['CANBOOKING']; ?>]</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Forms Nav -->

	  
	 
		
		
		<?php 
		$pcount = "select count(p_id) as PAYMENT from payment_tb";
		$pcountr = $con->query($pcount);
		foreach($pcountr as $pcountrv);
	  ?>
		
		 <li class="nav-item">
        <a class="<?php if($filename == 'payment'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=payment">
          <i class="bi bi-credit-card"></i><span>Payment [<?php echo $pcountrv['PAYMENT']; ?>]</span>
        </a>
		</li>
		
		<?php 
		$pgcount = "select count(pg_id) as PG from pg_tb";
		$pgcountr = $con->query($pgcount);
		foreach($pgcountr as $pgcountrv);
	  ?>
		<li class="nav-item">
        <a class="<?php if($filename == 'pg'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=pg">
          <i class="bi bi-house-door"></i><span>PG [<?php echo $pgcountrv['PG']; ?>]</span>
        </a>
		</li>
		
		<?php 
		$srcount = "select count(sr_id) as SERVICE from service_tb";
		$srcountr = $con->query($srcount);
		foreach($srcountr as $srcountrv);
	  ?>
        
      <li class="nav-item">
        <a class="<?php if($filename == 'service'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=service">
          <i class="bi bi-asterisk"></i><span>Service [<?php echo $srcountrv['SERVICE']; ?>]</span>
        </a>
		</li>
		
		<?php 
		$ucount = "select count(u_id) as USER from user_tb";
		$ucountr = $con->query($ucount);
		foreach($ucountr as $ucountrv);
	  ?>
      <li class="nav-item">
        <a class="<?php if($filename == 'user'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=user">
          <i class="bi bi-person-circle"></i><span>User [<?php echo $ucountrv['USER']; ?>]</span></i>
        </a>
        </li>
		
		<?php 
		$ocount = "select count(o_id) as OWNER from owner_tb";
		$ocountr = $con->query($ocount);
		foreach($ocountr as $ocountrv);
	  ?>
      <li class="nav-item">
        <a class="<?php if($filename == 'owner'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=owner">
          <i class="bi bi-person-check"></i><span>Owner [<?php echo $ocountrv['OWNER']; ?>]</span>
        </a>
		</li>
		
	 <?php 
		$catcount = "select count(cat_id) as CATEGORY from category_tb";
		$catcountr = $con->query($catcount);
		foreach($catcountr as $catcountrv);
	  ?>
	  
      <li class="nav-item">
        <a class="<?php if($filename == 'category'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=category">
          <i class="bi bi-menu-button-wide"></i>
          <span>Category [<?php echo $catcountrv['CATEGORY']; ?>]</span>
        </a>
      </li>
     
	<?php 
		$arcount = "select count(ar_id) as AREA from area_tb";
		$arcountr = $con->query($arcount);
		foreach($arcountr as $arcountrv);
	  ?>
      <li class="nav-item">
        <a class="<?php if($filename == 'area'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=area">
          <i class="bi bi-geo-alt"></i><span>Area [<?php echo $arcountrv['AREA']; ?>]</span>
        </a>
        </li>
 
	<?php 
		$fcountre = "select count(f_id) as REVIEW from feedback_tb f,user_tb u,pg_tb p where f.u_id = u.u_id and f.pg_id = p.pg_id and f.f_type = 'Review'";
		$fcountrev = $con->query($fcountre);
		foreach($fcountrev as $fcountreview);
	  ?>
		
		 <li class="nav-item">
        <a class="<?php if($filename == 'review'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=review">
          <i class="bi bi-chat-left-dots"></i><span>Review [<?php echo $fcountreview['REVIEW']; ?>]</span>
        </a>
		</li>
		
		<?php 
		$fcount = "select count(f_id) as QUERY from feedback_tb where f_type = 'Query'";
		$fcountr = $con->query($fcount);
		foreach($fcountr as $fcountrv);
	  ?>
		
		 <li class="nav-item">
        <a class="<?php if($filename == 'query'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=query">
          <i class="bi bi-question-diamond"></i><span>Query [<?php echo $fcountrv['QUERY']; ?>]</span>
        </a>
		</li>
	
		
		<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-plus-lg"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?file=bookingreport">
              <i class="bi bi-circle"></i><span>Booking</span>
            </a>
          </li>
          <li>
            <a href="index.php?file=userreport">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>
          <li>
            <a href="index.php?file=ownerreport">
              <i class="bi bi-circle"></i><span>Owner</span>
            </a>
          </li>
		  <li>
            <a href="index.php?file=pgreport">
              <i class="bi bi-circle"></i><span>Pg</span>
            </a>
          </li>
		  <li>
            <a href="index.php?file=feedbackreport">
              <i class="bi bi-circle"></i><span>Feedback</span>
            </a>
          </li>
		  
        </ul>
      </li><!-- End Icons Nav -->
	  
	   <li class="nav-item">
        <a class="<?php if($filename == 'logout'){ echo "nav-link"; }else { echo "nav-link collapsed"; } ?>" href="index.php?file=logout">
          <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
        </a>
		</li>
		


    </ul>