<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = 'Asuransi Penunjang Asuransi Utama';
				$jdlx = 'Asuransi<span> Penunjang</span>';
			}else{
				$jdl = 'Supported Cedants';
				$jdlx = 'Supported<span> Cedants</span>';
			}

				
	?>	
	
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth.php'); ?>
<?php $this->load->view('frontend/include/heading.php'); ?>
<style>
h3, h2 > span {
  color: #07c;
}
</style>
</head>
<body>
<div class="mask-l" style="background-color: #fff; width: 100%; height: 100%; position: fixed; top: 0; left:0; z-index: 9999999;"></div> <!--removed by integration-->
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

	<section class="">
	<div class="container">
		<div class="l-inner-page-container">
		   
			
			<!------------------------------------------------>

			<div class="row">
				<div class="b-section-info__text f-section-info__text col-sm-7 col-xs-12">
					
					<div class="heading-title heading-line-double" style="margin-top:10px;">
						<h2 class="f-primary-b"><?= $jdlx; ?></h2>
					</div>

					<div class="b-section-info__text_group">
						<ul class="c-primary c--inherit b-list-markers f-list-markers b-list-markers--without-leftindent f-list-markers--medium f-color-primary b-list-markers-2col f-list-markers-2col">
							<?php 
							foreach($c_cedant as $r){
							$prd 	= $r['asuransi'];
							$link 	= $r['link_perusahaan'];
							$det 	= $r['upload_cedant'];
							
							 
							
							?>

							<li STYLE="padding-top:18px;"><i class="fa fa-check-circle b-list-markers__ico f-list-markers__ico"></i>
							<img src="<?= base_url('/assets/gbrupload/').$det; ?>" alt="<?= $prd; ?>" height="60">
							</li>
							
							<?php
								}
							?>
							
						</ul>

					</div>
				</div>
				
				<div class="b-section-info__img col-sm-5 col-xs-12">
					<img data-retina class="j-data-element" data-animate="fadeInRight" src="<?= base_url(); ?>assets/images/cs.png" alt="" height="100%" style="margin-top:150px;"/>
				</div>
			</div>


			
	<!--------------------------------------------------------->		
		   
		</div>
	</div>

	</section>
</div>

  <?php $this->load->view('frontend/footer.php'); ?>
  <?php $this->load->view('frontend/javascript.php'); ?>



</body>
</html>
