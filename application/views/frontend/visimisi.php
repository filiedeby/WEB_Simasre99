<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = "Visi dan Misi";
			}else{
				$jdl = "Vision and Mission";				
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
body {
  scroll-behavior: smooth;
}

.f-primary-l b, strong {
    color: #07c !important;
  }

  .f-primary-l {
    color: #959595 !important;
  }
		
</style>

</head>
<body>
<div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 800px; left:0; z-index: 9999999;"></div> <!--removed by integration-->
<?php $this->load->view('frontend/include/headermenu.php'); ?>


<div class="j-menu-container"></div>

<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page2">
  <div class="b-inner-page-header__content">
    <div class="container">
      <h1 class="f-primary-l " style="color:#fff;"> <?= $jdl; ?></h1>
    </div>
  </div>
</div>

<div class="l-main-container" style="margin-bottom:0px;">
	<div class="b-breadcrumbs f-breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="<?= base_url(); ?>"> <i class="fa fa-home"> </i> Home</a> </li>
				<li><i class="fa fa-angle-right"></i> <span> <?= $jdl; ?></span> </li>
			</ul>
		</div>
	</div>

<section class="b-infoblock b-desc-section-container" style="background-image: url(<?= base_url("assets/images/visimisi-01.png"); ?>); 
background-repeat: no-repeat;
  background-position: right 7px bottom -254px;
  background-size: 900px auto;"> 
	<div class="container">
		<div class="l-inner-page-container">
		   
			
<!------------------------------------------------>

				<div class="gambar" align="right"></div>
			<div class="b-shortcode-example">

				<div class="row">
					
						<?php
						$nom = '1';
						foreach($c_visimisi as $r){
						$tit 	= $r['title'];
						$isi 	= $r['isi'];
						$ico 	= $r['icon'];
						?>

							  <h3 class="f-primary-l f-center"><?= $tit; ?></h3>
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
			</div>
<!--------------------------------------------------------->		
		   
		</div>
	</div>
</section>

</div>

  <?php $this->load->view('frontend/footer.php'); ?>
  <?php $this->load->view('frontend/javascript.php'); ?>
  
  <script>
  
  const element = document.getElementById("engine");
element.style.fontSize = "12px";
element.style.display = "none";

  const element = document.getElementById("propert");
element.style.fontSize = "12px";

</script>

<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>



</body>
</html>
