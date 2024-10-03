<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth.php'); ?>


</head>
<body>
  <div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 0; left:0; z-index: 9999999;"></div> <!--removed by integration-->
  
  
<?php $this->load->view('frontend/include/headermenu'); ?>


<div class="j-menu-container"></div>


  <div class="l-main-container">
  <?php $this->load->view('frontend/include/slider.php'); ?>
  
  <?php $this->load->view('frontend/homeproduk.php'); ?>



<div class="b-info-container f-info-container" style="padding-top:20px;">
  <div class="container">
    <div class="b-info-container__title f-info-container__title">
	
					<?php 
					foreach($c_history as $r){
					$thistory 		= $r['title'];
					$thistoryisi 	= $r['isi'];
					?>
	
						<?= "<h2 style='color:#fff;'>".$thistory."</h2>"; ?>
		</div>
						<p class="b-info-container__text f-info-container__text f-secondary-l-it" >
					
						<?= $thistoryisi; ?>
					<?php
					}
					?>
  </div>
</div>
</div>

  <?php $this->load->view('frontend/footer.php'); ?>

  <?php $this->load->view('frontend/javascript.php'); ?>
  
  


</body>
</html>
