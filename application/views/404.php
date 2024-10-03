<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = "404 Halaman tidak ditemukan!";	
				$ojk = "Telah terdaftar dan diawasi oleh";	
			}else{
				$jdl = "404 Page not found!";	
				$ojk = " Has been registered and supervised by";	
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

h2 > span {
  color: #8ab933;
  font-weight: bolder;
}

h3 > span {
  color: #8ab933;
  font-weight: bolder;
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

	.b-footer-primary {
  box-shadow: 0 0 3px 0 #f3eeeb;
  background: #424242 !important;
  border-bottom: 1px solid #e9e9e9;
  padding: 14px 0 8px 0;
  color: #fff !important;
  font-weight: bolder;
}

.f-contacts-short-item__icon_xs {
  font-size: 1.07692em;
  line-height: 1.5 !important;
}

.b-contacts-short-item {
  border-top: 1px solid #dddddd;
  padding-bottom: 5px !important;
  padding-top: 5px !important;
}

/*======================
    404 page
=======================*/


.page_404{ margin-top:100px; margin-bottom:100px; padding:40px 0; background:#fff; font-family: 'Arvo', serif;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(<?= base_url('assets/dribbble_1.gif'); ?>);
    height: 410px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
			 font-size:80px;
			 }
			 
			 .link_404{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
	.contant_box_404{ margin-top:-50px;}


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


<!-- ========================isi  -->
<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">404</h1>
		
		
		</div>
		
		<div class="contant_box_404">
		<h3 class="h2">
		Look like you're lost
		</h3>
		
		<p>the page you are looking for not avaible!</p>
		
		<a href="<?= base_url(); ?>" class="link_404">Go to Home</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
<!-- ========================isi  -->
  



</div>

<!-- ------------------- footer -->



<footer style="background: #f4f4f4;">
  <div class="b-footer-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-xs-12 f-copyright b-copyright">
			
			<span style="margin-top:10px;"> &nbsp;&nbsp;Copyright @ 2013 PT. Simas Reinsurance Brokers. All rights reserved</span>
			</div>
            <div class="col-sm-7 col-xs-12 f-copyright b-copyright" style="text-align: right;">
						<img  src="<?= base_url(); ?>assets/images/mariberasuransikbru.webp" alt="Logo" width="7%;"/>
						<?= $ojk; ?> 
						<img  src="<?= base_url(); ?>assets/images/ojk.webp" alt="Logo" width="10%;"/>
            </div>
        </div>
    </div>
</div>

</footer>

<!-- ------------------- footer -->
  <?php $this->load->view('frontend/javascript.php'); ?>


</body>
</html>
