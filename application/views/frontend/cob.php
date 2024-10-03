<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = 'Bisnis';
			}else{
				$jdl = 'Class of Business';				
			}
			
	?>	
	
<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('frontend/include/head-oth.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
.b-accordion--info.ui-accordion .ui-accordion-header .ui-accordion-header-icon::before {
  font-family: "Font Awesome 5 Free"; /* Terapkan Font Awesome */
  font-weight: 900; /* Pastikan menggunakan berat font yang benar (bold) */
}

.b-accordion--info.ui-accordion .ui-accordion-header .ui-accordion-header-icon::after {
  font-family: "Font Awesome 5 Free"; /* Terapkan Font Awesome */
  font-weight: 900; /* Pastikan menggunakan berat font yang benar (bold) */
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
            <li><i class="fa fa-angle-right"></i> <span> <?= $jdl; ?></span></li>
        </ul>
    </div>
</div>


<div class="container">
    <div class="l-inner-page-container">
       
		
		<!------------------------------------------------>

        <div class="b-shortcode-example">

            <div class="row">
                <div class="col-sm-6">
                    <img  src="<?= base_url(); ?>assets/images/bisnis.png" alt="cob" width="80%;" />
                </div>
                <div class="col-sm-6">
				
                    <?php
					$idx = $this->uri->segment(3);
					// var_dump($idx);
					?>
					
					<!--5-->
					<div class="j-accordion b-accordion f-accordion b-accordion--info f-accordion--info">
                        
						<?php
						$nom5	='1';
						
						foreach($c_cob as $r){
						$prd5 	= $r['produk'];
						$det5	= $r['detail'];
						$url	= $r['url'];
						// var_dump($url);
						
						if($idx == 'bond'){
							$aria5	='true';
							$eksekusi5 = 'display: block !important;';
							$akt5 = "ui-accordion-content ui-helper-reset ui-corner-bottom ui-accordion-content-active";
							$hide ="";
							
							
						}
						else if($idx == 'marine'){
							$aria5	='true';
							$eksekusi5 = 'display: block !important;';
							$akt5 = "ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active";
							$hide ="";
							
							
						}
						else if($idx == 'propert'){
							$aria5	='true';
							$eksekusi5 = 'display: block !important;';
							$akt5 = "ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active";
							$hide ="";
							
							
						}
						else if($idx == 'casual'){
							$aria5	='true';
							$eksekusi5 = 'display: block !important;';
							$akt5 = "ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active";
							$hide ="";
							
							
						}
						else if($idx == 'engine'){
							$aria5	='true';
							$eksekusi5 = 'display: block !important;';
							$akt5 = "ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active";
							$hide ="";
							
							
						}
						else{
							$aria5	='false';
							$eksekusi5 = 'display: none !important;';
							$akt5 = "ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom";
							$hide ="hidden";
							
						}
						?>
												
						<h5 class="<?= $akt5; ?>" role="tab<?= $nom5; ?>" id="<?= $url; ?>" aria-controls="<?= $url; ?>"  aria-expanded="<?= $aria5; ?>" tabindex="<?= $nom5; ?>" style="padding-bottom:15px;">
							<b>
								<?= $nom5.'. '.$prd5; ?>
							</b>
						</h5>
                        <div>
                        <div id="<?= $url; ?>" >
						<?= $det5; ?>	
                        </div>
                        </div>
                        <?php
						$nom5++;
						}
						?> 
                    </div>
					

					
                </div>
            </div>
        </div>
		
<!--------------------------------------------------------->		
       
    </div>
</div>


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
