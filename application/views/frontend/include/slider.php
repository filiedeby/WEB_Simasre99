<div class="b-slidercontainer b-slider">
      <div class="j-fullscreenslider j-arr-hide">
          <ul>
		  
	 <?php 
	$nor = '1';
	foreach($c_slider as $r){
	$isi1 	= $r['content1'];
	$isi2 	= $r['content2'];
	$img 	= $r['images'];
	?>
		<li data-transition="slotfade-vertical" data-slotamount="<?= $nor; ?>" >
		  <div class="tp-bannertimer"></div>
		  <img data-retina src="<?= base_url(); ?>assets/images/header/<?= $img; ?>" height="100%">
		  <div class="caption lft caption-left"  data-x="left" data-y="200" data-hoffset="80" data-speed="700" data-start="2000">
			  <div class="b-slider-lg-info-l__item-title f-slider-lg-info-l__item-title b-slider-lg-info-l__item-title-tertiary b-bg-slider-lg-info-l__item-title">
				  <h3 class="f-primary-l" style="color: #ccc"><?= $isi1; ?></h3>
				  <h2 class="f-primary-b"><?= $isi2; ?></h2>
			  </div>
		  </div>
		  
		</li>
	
	
	<?php
	$nor++;
	}
	?>
		  
        
          </ul>
      </div>
  </div>
