<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = "Visi Misi";
			}else{
				$jdl = "Visi Misi ";				
			}
			
	?>	
	
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth.php'); ?>
<style>
.b-infoblock-with-icon__icon {
font-size: 30px !important;
color: white !important;
}

</style>
</head>
<body>
<div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 0; left:0; z-index: 9999999;"></div>
<?php $this->load->view('frontend/include/headermenu.php'); ?>


<div class="j-menu-container"></div>

	<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page2">
	  <div class="b-inner-page-header__content">
		<div class="container">
		  <h1 class="f-primary-l " style="color:#fff;"><?= $jdl; ?></h1>
		</div>
	  </div>
	</div>

		<div class="l-main-container">
		<div class="b-breadcrumbs f-breadcrumbs">
			<div class="container">
				<ul>
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li><i class="fa fa-angle-right"></i><span><?= $jdl; ?></span></li>
				</ul>
			</div>
		</div>

			<section class="b-infoblock b-desc-section-container">
				<div class="container">
					
					<?php
					$nom = '1';
					foreach($c_visimisi as $r){
					$tit 	= $r['title'];
					$isi 	= $r['isi'];
					$ico 	= $r['icon'];
					?>

						  <h2 class="f-primary-l f-center"><?= $tit; ?></h2>
						  <div class="b-infoblock-with-icon-group row b-infoblock-with-icon--circle-icon">
							<div class="col-md-12 col-sm-12 col-xs-12">
							  <div class="b-infoblock-with-icon" style=" text-align: left;">
								<a href="#" class="b-infoblock-with-icon__icon f-infoblock-with-icon__icon fade-in-animate">
								  <i class="<?= $ico; ?>"></i>
								</a>
								<div class="b-infoblock-with-icon__info" style="font-size: 1.2em !important; line-height: 1.5 !important; ">
								  <?= $isi; ?>
								 
								</div>
							  </div>
							</div>
						  </div>
				  
					<?php
					$nom++;
					}
					?> 
				  
				  
				  
				  
				</div>
				<img class="color-theme" data-retina src="<?= base_url(); ?>assets/images/visimisi-01.png" alt="Logo" width="70%;" style="position:absolute !important; left: 50%;  top: 50%; z-index: -1;"/>
				<div style="text-align: right; padding-bottom:300px;">
				</div>
				
				
				
  <?php $this->load->view('frontend/footer.php'); ?>
			</section>
  



</div>

  <?php $this->load->view('frontend/javascript.php'); ?>


</body>
</html>
