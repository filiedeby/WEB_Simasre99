<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = "Reasuransi Pendukung";
				$jdlin = "<span>Reasuransi</span> <b>Internasional</b>";
				$jdlid = "<span>Reasuransi</span> <b>Indonesia</b>";
				$jdlxin = "Internasional";
				$jdlxid = "Indonesia";
				
					
			}else{
				$jdl = "Supported Reinsurance's";
				$jdlin = "<b>International</b> <span>Reinsurance's</span>";
				$jdlid = "<b>Indonesian</b> <span>Reinsurance's</span>";
				$jdlxin = "International";
				$jdlxid = "Indonesian";
			}
			
	?>	
	
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth.php'); ?>
<?php //$this->load->view('frontend/include/smarty-css.php'); ?>
<?php $this->load->view('frontend/include/heading.php'); ?>
<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}


h3, h2 > b {
  color: #07c !important;
}

h3, h2 > span {
  color: #aaa !important;
	font-weight: 400 !important;
}

.wrapper{
  display: inline-flex;
  background: #fff;
  height: 100px;
  width: 40%;
  align-items: center;
  justify-content: space-evenly;
  border-radius: 5px;
}
.wrapper .option{
  background: #fff;
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  margin: 0 10px;
  border-radius: 5px;
  cursor: pointer;
  padding: 8px 10px;
  border: 2px solid lightgrey;
  transition: all 0.3s ease;
}
.wrapper .option .dot{
  height: 20px;
  width: 20px;
  background: #d9d9d9;
  border-radius: 50%;
  position: relative;
}
.wrapper .option .dot::before{
  position: absolute;
  content: "";
  top: 4px;
  left: 4px;
  width: 12px;
  height: 12px;
  background: #0069d9;
  border-radius: 50%;
  opacity: 0;
  transform: scale(1.5);
  transition: all 0.3s ease;
}

input[type="radio"]{
  display: none;
}
#option-1:checked:checked ~ .option-1,
#option-2:checked:checked ~ .option-2{
 
  border-color: #a61001;
  background: #c00;
  
}
#option-1:checked:checked ~ .option-1 .dot,
#option-2:checked:checked ~ .option-2 .dot{
  background: #fff;
}
#option-1:checked:checked ~ .option-1 .dot::before,
#option-2:checked:checked ~ .option-2 .dot::before{
  opacity: 1;
  transform: scale(1);
}
.wrapper .option span{
  font-size: 20px;
  color: #808080;
}
#option-1:checked:checked ~ .option-1 span,
#option-2:checked:checked ~ .option-2 span{
  color: #fff;
}

label {
  display: block;
}
label {
  font-weight: 400;
}
label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
  font-weight: 700;
}


.radio input + i::after {
  background-color: rgba(0,0,0,8);
}
.radio input + i::after {
  content: '';
  top: 5px;
  left: 5px;
  width: 5px;
  height: 5px;
  border-radius: 50%;
}
.radio input + i::after, .checkbox input + i::after {
  position: absolute;
  opacity: 0;
  transition: opacity 0.1s;
  -o-transition: opacity 0.1s;
  -ms-transition: opacity 0.1s;
  -moz-transition: opacity 0.1s;
  -webkit-transition: opacity 0.1s;
}

.radio-buttons label {
	font-size:20px;
}

.map-container {
    position: relative;
    width: 500px;
    height: 500px;
    overflow: hidden;
    border: 1px solid #ddd;
    margin-top: 20px;
}

#world-map {
    width: 100%;
    height: 100%;
    transition: transform 1s ease;
}

#world-map.zoomed {
    transform: scale(2.5) translate(1%, -11%);
}

#world-map.globe {
    transform: scale(1) translate(0, 0);
}

.info {
    margin-top: 20px;
}

h3 > span{
	color: #8ab933;
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
      <h1 class="f-primary-l " style="color:#fff;"> <?= $jdl; ?></h1>
    </div>
  </div>
</div>

<div class="l-main-container">
<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(); ?>"> <i class="fa fa-home"> </i>Home </a> </li>
            <li><i class="fa fa-angle-right"></i> <span> <?= $jdl; ?></span></li>
        </ul>
    </div>
</div>



<section class="" style="padding-bottom:240px;">
<div class="container">

<!--------------------------------------------------------->
<!--------------------------------------------------------->
	<div class="col-md-12 col-sm-12">
	
	
		<div class="wrapper"  style="margin-top:25px; margin-bottom:15px;">
			<div class="col-md-12" style="margin-bottom:0px;"> 
			 <input type="radio" name="region" id="option-1" value="international" checked>
			  <label for="option-1" class="option option-1">
				<div class="dot"></div>
				<span><?= $jdlxin; ?></span>
			  </label>
			</div>  
			
			<div class="col-md-12">  
			 <input type="radio" name="region" id="option-2" value="indonesia">
			  <label for="option-2" class="option option-2">
				<div class="dot"></div>
				<span><?= $jdlxid; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
			  </label>
			</div>  
		</div>

	</div>

	<div class="col-md-8 col-sm-6">
		<div id="reas_inter" class="info" style="margin-top:10px;">

			<div class="b-section-info__text f-section-info__text col-sm-12 col-xs-12">
				<div class="heading-title heading-line-double" style="margin-top:10px;">
						<h2 class="f-primary-b"><?= $jdlin; ?></h2>
					</div>
				
				<div class="b-section-info__text_group">
					<ul class="c-primary c--inherit b-list-markers f-list-markers b-list-markers--without-leftindent f-list-markers--medium f-color-primary b-list-markers-2col f-list-markers-2col">
						<?php 
						
						foreach($c_inter as $r){
						$reins 		= $r['insurance'];
						$reinsgbr 	= $r['gbr'];
						$insured 	= $r['upload_ins'];
						
						 
						
						?>

						<li STYLE="padding-top:18px;"><i class="fa fa-check-circle b-list-markers__ico f-list-markers__ico"></i>
							<img src="<?php echo base_url().'assets/gbrupload/'.$insured; ?>" alt="<?= $reins; ?>" height="60">
						</li>
						
						<?php
							}
						?>
						
					</ul>

				</div>
			</div>

        </div>
		
        <div id="reas_indo" class="info" style="display: none;" style="margin-top:20px;">
		
			<div class="b-section-info__text f-section-info__text col-sm-12 col-xs-12">
				<div class="heading-title heading-line-double">
					<h2><?= $jdlid;?></h2>
				</div>
				
				<div class="b-section-info__text_group">
					<ul class="c-primary c--inherit b-list-markers f-list-markers b-list-markers--without-leftindent f-list-markers--medium f-color-primary b-list-markers-2col f-list-markers-2col">
						<?php 
						
						foreach($c_indo as $r){
						$reins 		= $r['insurance'];
						$reinsgbr 	= $r['gbr'];
						$insured 	= $r['upload_ins'];
						
						 
						
						?>

						<li STYLE="padding-top:18px;"><i class="fa fa-check-circle b-list-markers__ico f-list-markers__ico"></i>
							<img src="<?php echo base_url().'assets/gbrupload/'.$insured; ?>" alt="<?= $reins; ?>" height="60">
						</li>
						
						<?php
							}
						?>
						
					</ul>

				</div>
			</div>
			
			
        </div>

	</div>

	<div class="col-md-4 col-sm-6" >
		<div class="map-container j-data-element" data-animate="fadeInUp" >
            <img  src="<?= base_url('assets/images/MAP/'); ?>globe-01.png" alt="World Map" id="world-map">
        </div>

	</div>

<!--------------------------------------------------------->
<!--------------------------------------------------------->


</div>
</section>


</div>

  <?php $this->load->view('frontend/footer.php'); ?>
  <?php $this->load->view('frontend/javascript.php'); ?>
  <script>
  // scripts.js
document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="region"]');
    const worldMap = document.getElementById('world-map');
    const reasInter = document.getElementById('reas_inter');
    const reasIndo = document.getElementById('reas_indo');

    // Set initial display
    reasInter.style.display = 'block';
    reasIndo.style.display = 'none';

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (radio.value === 'indonesia') {
                worldMap.classList.add('zoomed');
                worldMap.classList.remove('globe');
                reasIndo.style.display = 'block';
                reasInter.style.display = 'none';
            } else {
                worldMap.classList.remove('zoomed');
                worldMap.classList.add('globe');
                reasInter.style.display = 'block';
                reasIndo.style.display = 'none';
            }
        });
    });
});



  </script>



</body>
</html>
