






<?php
if(get_cookie('lang_is') === 'en'){

				$jdl = 'slide Foto Aktivitas Kami';
			}else{
				$jdl = 'Activity Photo Slides';				
			}
			
	?>		



<h4 class="f-primary-b"><?= $jdl; ?></h4>
<div class="b-short-photo-items-group">

<?php
			

foreach($c_gallery as $r){
	$tit 	= $r['title'];	
	$add 	= $r['gbr'];	
?>		

 


    <div class="b-column">
        <a class="b-short-photo-item fancybox" href="<?= base_url('assets/images/galery/big/').$add; ?>" title="<?= $tit; ?>" rel="footer-group"><img width="62" height="62" data-retina src="<?= base_url('assets/images/galery/big/').$add; ?>" alt=""/></a>
    </div>


<?php

}
?>    
</div>