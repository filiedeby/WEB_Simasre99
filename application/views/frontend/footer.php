

<?php

if(get_cookie('lang_is') === 'en'){

				$ojk = "Telah terdaftar dan diawasi oleh";

				
					
			}else{
				$ojk = " Has been registered and supervised by";

			}
			
	?>	


<style>
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
</style>

<?php
if(get_cookie('lang_is') === 'en'){
$konctus	= "Kontak Kami ";


}else{
$konctus	= "Contact Us ";
}

?>

<footer style="background: #f4f4f4;">
  <div class="b-footer-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-xs-12 f-copyright b-copyright">
			
			<span style="margin-top:10px;"> &nbsp;&nbsp;Copyright @ 2013 PT. KBRU Reinsurance Brokers. All rights reserved</span>
			</div>
            <div class="col-sm-7 col-xs-12 f-copyright b-copyright" style="text-align: right;">
						<img  src="<?= base_url(); ?>assets/images/mariberasuransikbru.webp" alt="Logo" width="6%;"/>
						<?= $ojk; ?> 
						<img  src="<?= base_url(); ?>assets/images/ojk.webp" alt="Logo" width="10%;"/>
            </div>
        </div>
    </div>
</div>
  <div class="container" >
    <div class="b-footer-secondary row">

      <div class="col-md-5 col-sm-12 col-xs-12 f-center b-footer-logo-containter">
          <div class="resizembl-logo">
						<a href=""><img data-retina class="color-theme" style="margin-bottom: 10px;" src="<?= base_url(); ?>assets/images/lgsimasre.webp" alt="Logo" width="140px;"/></a>
						<br/>
						<b>PT. KBRU REINSURANCE BROKERS</b><br/><br/>
					</div>
					
					<div class="b-footer-logo-text resizembl-disclaimer">
          
								<div style="font-size:10px;">
										<?php 
										foreach($c_disclaimer as $r){
											$tipe 	= $r['type'];	
											$isi 	= $r['isi'];	
										?>		
										<span style="font-size:10px; line-height: 1.7;">
										<b><?= $tipe; ?> </b><i><?= $isi; ?></i>
										</span>
										<?php
										}
										?> 
								</div>

        </div>
      </div>
	  
	   <div class="col-md-4 col-sm-12 col-xs-12">
        <h4 class="f-primary-b"><?= $konctus; ?></h4>
        <div class="b-contacts-short-item-group">
          <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
            <div class="b-contacts-short-item__icon f-contacts-short-item__icon f-contacts-short-item__icon_xs b-left">
              <i class="fa fa-home"></i>
            </div>
            <div class="b-remaining f-contacts-short-item__text">
<?php 
foreach($c_contact as $r){
	$tit 	= $r['title'];	
	$add 	= $r['address'];	
?>		
<b><?= $tit; ?> </b><br/>
<?= $add; ?>
<?php

}
?> 


            </div>
            			
          </div>
		  
<?php 
foreach($c_sosmed as $r){
	$ico 	= $r['icon'];	
	$tipe 	= $r['type_sosmed'];	
	$lnk 	= $r['link'];	
?>		

 		  
          <div class="b-contacts-short-item col-md-12 col-sm-4 col-xs-12">
            <div class="b-contacts-short-item__icon f-contacts-short-item__icon f-contacts-short-item__icon_xs b-left">
              <i class="<?= $ico; ?>"></i>
            </div>
            <div class="b-remaining f-contacts-short-item__text">
             <a href="<?= $lnk; ?>">
				<?= $tipe; ?>
            </a>
			
            </div>
          </div>
		  
		  
<?php

}
?>		  
		  
        
        </div>
      </div>
      
     
    <div class="col-md-3 col-sm-12 col-xs-12 ">
	  <?php $this->load->view('frontend/include/galery.php'); ?>

      </div>
    </div>
  </div>
  
  
  
</footer>
