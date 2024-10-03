<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = "Personel Kami";		
			}else{
				$jdl = "Our Teams";		
			}
			
	?>	
	
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth.php'); ?>
<?php $this->load->view('frontend/include/heading.php'); ?>
<style>
.imgbod {
//border: 3px solid #fff;
border-radius: 50%;
background-color: #00cfff;
display: block;
padding: 11px 11px;
position: relative;
width: 25px;

}

/* h2 > span {
  color: #8ab933;
  font-weight: bolder;
}

h3 > span {
  color: #8ab933;
  font-weight: bolder;
} */

h3 {
  color: #aaa !important;
	font-weight: 400 !important;
}

h3 > span {
  color: #07c !important;
  font-weight: 700 !important;
}

.bgnews{
	background-image: url('<?= base_url(); ?>assets/images/BUSINESSPEOPLES-01.png'); 
	background-repeat: no-repeat; 
	background-position: right 110px bottom; 
	background-size: 650px auto;"> 
}

	@media (max-width: 576px) {
		.bgnews{
			background-image: url('<?= base_url(); ?>assets/images/BUSINESSPEOPLES-01.png'); 
			background-repeat: no-repeat; 
			background-position: right 10px bottom;   
			background-size: 300px auto !important;
		}
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
      <h1 class="f-primary-l " style="color:#fff;"> <?= $jdl; ?> </h1>	  
    </div>
  </div>
</div>

<div class="l-main-container">
<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(); ?>"><i class="fa fa-home"> </i> Home</a> </li>
            <li> <i class="fa fa-angle-right"></i> <span> <?= $jdl; ?></span></li>
        </ul>
    </div>
</div>

<?php
		foreach($c_team as $r){
			$isi 	= $r['name'];
			$title 	= $r['title'];
			$group 	= $r['type_group'];
			$key 	= $r['typekey'];
		
			if(get_cookie('lang_is') === 'en'){
				
				$headersection = "Temui <b style='color:red;' >Team kerja</b> Kami";
				
			}
			else
			{
				$headersection = "Meet our <b style='color:red;' >team</b> work";
				
			}
		}		
?> 
		
		
<section class="b-infoblock b-desc-section-container bgnews">
    <div class="container" style="padding-bottom: 270px;">
	<h2 class="f-primary-b f-center"  style="padding-bottom: 40px;"><?= $headersection; ?></h2>

		
		<!-------------------- KOMISARIS ---------------------->
		<?php
		if(isset($c_teamcms[0]['type_group'])){
			$headercms = $c_teamcms[0]['type_group'];
			$csscms = "block";
		}else{
			$headercms = '';
			$csscms = "none";
		}
		
		
		// var_dump($headercms);
		
		if($headercms == "Jajaran Direksi"){
			$tit = "Jajaran	<span class='direk'>Direksi</span>";
		}else if($headercms == "Jajaran Komisaris"){
			$tit = "Jajaran <span class='direk'>Komisaris</span>";
		}else if($headercms == "Board of Director"){
			$tit = "Board of <span class='direk'>Director</span>";
		}else if($headercms == "Board of Commissioner"){
			$tit = "Board of <span class='direk'>Commissioner</span>";
		}else{
			$tit = "";
		}
		
		
		$Countcms = 0;
			foreach($c_teamcms as $row){
				
			$Countcms++;
			}
			
			if($Countcms <= 1){
				$col = '12';
			}else if($Countcms == 2){
				$col = '6';
			}else if($Countcms == 3){
				$col = '4';
			}else{
				$col = '3';
			}	
		?>
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:50px; display:<?= $csscms ?>">
			 
				<!-- <div class="heading-title heading-line-double" style="margin-top:10px;">
					<h3><?= $tit;?></h3>
				</div> -->

				<div class="heading-title heading-line-double" style="margin-top:10px; ">
					<h2 class="f-primary-b"><?= $tit; ?></h2>
				</div>
			 <?php

			foreach($c_teamcms as $rx){
			
				$isiX 	= $rx['name'];
				$titleX = $rx['title'];
				$tdetX 	= $rx['det_title'];
				// $bhs	= $rx['bahasa'];			
				?>
	
			
			<div class="col-md-<?= $col; ?> col-sm-<?= $col; ?> col-xs-12" style="padding-bottom:40px; text-align: center;">
					<div class="row">
						<div style="padding:0px 0px 0px 0px !mportant; margin:200px !mportant;">
							
							<div style="padding:0px !mportant; margin:0px !mportant;"><h3 style="line-height: 1; margin: 0 !important;"><b><?= $isiX; ?></b></h3></div>
							<div style="padding:0px !mportant; margin:0px !mportant;"><h4><i><?= $titleX; ?></i></h4></div>
							<div style="padding:0px !mportant; margin:0px !mportant;"><i><?=$tdetX; ?></i></div>
						   
						</div>
					</div>
			 </div>	
			
			<?php
			}
			
			?> 
					

		  
		</div>
		
		<!-------------------- DIREKSI ------------------------>
		<?php
		
		if(isset($c_teambod[0]['type_group'])){
			$headerbod = $c_teambod[0]['type_group'];
			$cssbod = "block";
		}else{
			$headerbod = '';
			$cssbod = "none";
		}
		
		// var_dump($headerbod);
		
		if($headerbod == "Jajaran Direksi"){
			$titbod = "Jajaran <span>Direksi</span>";
		}else if($headerbod == "Jajaran Komisaris"){
			$titbod = "Jajaran <span>Komisaris</span>";
		}else if($headerbod == "Board of Director"){
			$titbod = "Board of <span>Director</span>";
		}else if($headerbod == "Board of Commissioner"){
			$titbod = "Board of <span>Commissioner</span>";
		}else{
			$titbod = "";
		}
		
		$Countbod = 0;
			foreach($c_teambod as $row){
			$Countbod++;
			}
			
			if($Countbod <= 1){
				$col = '12';
			}else if($Countbod == 2){
				$col = '6';
			}else if($Countbod == 3){
				$col = '4';
			}else{
				$col = '3';
			}
		?>
		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:50px; display:<?= $cssbod ?>">
			<div class="heading-title heading-line-double" style="margin-top:10px;">
					<h3><?= $titbod;?></h3>
			</div>
			
			 
			 <?php
			
			foreach($c_teambod as $rx){
			
				$isiX 	= $rx['name'];
				$titleX = $rx['title'];
				$tdetX 	= $rx['det_title'];
				// $bhs	= $rx['bahasa'];			
				?>
	
			
			<div class="col-md-<?= $col; ?> col-sm-<?= $col; ?> col-xs-12" style="padding-bottom:40px; text-align: center;">
					<div class="row">
						<div style="padding:0px 0px 0px 0px !mportant; margin:200px !mportant;">
							
							<div style="padding:0px !mportant; margin:0px !mportant;"><h3 style="line-height: 1; margin: 0 !important;"><b><?= $isiX; ?></b></h3></div>
							<div style="padding:0px !mportant; margin:0px !mportant;"><h4><i><?= $titleX; ?></i></h4></div>
							<div style="padding:0px !mportant; margin:0px !mportant;"><i><?=$tdetX; ?></i></div>
						   
						</div>
					</div>
			 </div>	
			
			<?php
			}
			
			?> 
					

		  
		</div>
		
	  

    </div>
  </section>
  



</div>

  <?php $this->load->view('frontend/footer.php'); ?>
  <?php $this->load->view('frontend/javascript.php'); ?>
  <script>
  // var x = document.getElementById("fl1");   // Get the element with id="elementid"
  // x.style.color = "green"; 
  </script>



</body>
</html>
