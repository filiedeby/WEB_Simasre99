<section class="b-bg-full-primary">
  <div class="container">
    <div class="b-categories-icons">
    <?php 
	$nor = '1';
	foreach($c_icoproduct as $r){
	$ico 	= $r['icon'];
	$tit 	= $r['title'];
	$isi 	= $r['isi'];
	$lnk 	= $r['url'];
	
	?>
	  <div class="b-categories-icons__item f-categories-icons__item b-column">
        <a class="b-categories-icons__item_link" href="<?= base_url('main/cob/').$lnk;?>">
          <div class="b-categories-icons__item_icon f-categories-icons__item_icon fade-in-animate">
            <i class="<?= $ico; ?>"></i>
          </div>
          <div class="b-remaining b-categories-icons__item_text">
            <div class="b-categories-icons__item_name f-categories-icons__item_name f-secondary-b"><?= $tit; ?></div>
            <div class="b-categories-icons__item_info f-categories-icons__item_info f-secondary-l"><?= $isi; ?> </div>
          </div>
        </a>
      </div>
	<?php
	$nor++;
	}
	?>  
	  
	  
	  
    </div>
  </div>
</section>