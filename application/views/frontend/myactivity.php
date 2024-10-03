<?php

if(get_cookie('lang_is') === 'en'){

				$jdl = "Kegiatan Kami";		
			}else{
				$jdl = "Our Activities";		
			}
			
	?>	
	
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('frontend/include/head-oth.php'); ?>
<?php $this->load->view('frontend/include/heading.php'); ?>


	<style>
	

	 
		li {
		text-align: left !important;

		}


        .news-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .news-title {
            font-weight: bold;
            flex: 1;
        }
        .news-date {
            color: #999;
            margin-left: 20px;
            white-space: nowrap;
        }
        .pagination-links {
            margin: 20px 0;
            text-align: center;
        }
        .pagination-links span, .pagination-links a {
            margin: 0 5px;
            padding: 8px 16px;
            background: #f4f4f4;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
        }
        .pagination-links .current {
            font-weight: bold;
            background: #ddd;
        }

				.pagination > li > b, .pagination > li > b {
					position: relative;
					float: left;
					padding: 6px 12px;
					line-height: 1.42857143;
					text-decoration: none;
					color: #ac0404;
					background-color: #fff;
					border: 1px solid #ddd;
					margin-left: -1px;
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
            <li><a href="#"><i class="fa fa-home"></i> Home </a></li>
            <li><i class="fa fa-angle-right"></i><span> <?= $jdl; ?></span></li>
        </ul>
    </div>
</div>

<?php
		$array = $news;

		if (count($array) === 0) {
			$headersection = "<b style='color:red;' >No news found </b>";
			if(get_cookie('lang_is') === 'en'){						
				$headersection = "<b style='color:red;' >tidak ada aktifitas / berita </b>";				
			}else{
				$headersection = "<b style='color:red;' >No activity / news found </b>";				
			}
		} else {
				// Lakukan sesuatu jika array tidak kosong
				foreach($news as $r){	
					if(get_cookie('lang_is') === 'en'){
						
						$headersection = "Aktivitas <b style='color:red;' >Menarik </b> Kami";
						$sources_fr		=	"Sumber dari : ";
						
					}
					else
					{
						$headersection = "Our <b style='color:red;' >Atractive</b> Activities";
						$sources_fr		=	"Sources From : ";
						
					}
				}
		}

?> 
		
		
<section class="b-infoblock b-desc-section-container" style="background-image: url('<?= base_url(); ?>assets/img/media.png'); background-repeat: no-repeat; background-position: right 10px bottom; background-size: 600px auto;"> 
    <div class="container" style="padding-bottom: 270px;">
	<h2 class="f-primary-b f-center"  style="padding-bottom: 40px;"><?= $headersection; ?></h2>
	
	
		
		<!-------------------- aktifitas ---------------------->

		<div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:50px;">
			 
		<?php if (!empty($news)): 
			
			?>
        <?php foreach ($news as $news_item): ?>
		
			<!-- H3 -->
			<div class="heading-title heading-border-bottom heading-color">
			
				<div class="news-item">
					<div class="news-title"><h2><?php echo $news_item['title']; ?></h2></div>
					<div class="news-date"><?php echo date('d M Y', strtotime($news_item['recdate'])); ?></div>
				</div>
		
			
			
			</div>
			
            <div><?php echo $news_item['activity']; ?></div><br/>
            <div><i><b><?= $sources_fr; ?></b><?php echo $news_item['write_from']; ?></i></div>
            
        <?php endforeach; ?>



			
		</div>
		
		
	  

    </div>

		<?php else: ?>
       
    <?php endif; ?>
			 
			
			<div class="pagination-links">
								<?php echo $pagination; ?>
				</div>
  </section>
  



</div>

  <?php $this->load->view('frontend/footer.php'); ?>
  <?php $this->load->view('frontend/javascript.php'); ?>
  <script>
  // var x = document.getElementById("fl1");   // Get the element with id="elementid"
  // x.style.color = "green"; 
  </script>
  
  <script>
    // $(document).ready(function(){
      // $('a[href^="#"]').on('click', function(e) {
        // e.preventDefault();

        // var target = this.hash;
        // var $target = $(target);

        // $('html, body').stop().animate({
          // 'scrollTop': $target.offset().top
        // }, 1000, 'swing'); // 2000 milliseconds = 2 seconds
      // });

      // // Intercept the scroll event to slow it down
      // $(window).on('mousewheel DOMMouseScroll', function(event) {
        // event.preventDefault();

        // var delta = event.originalEvent.wheelDelta || -event.originalEvent.detail;
        // var scrollTop = $(window).scrollTop();
        // var finalScroll = scrollTop - (delta * 10); // Adjust 30 to change the scroll speed

        // $('html, body').stop().animate({
          // scrollTop: finalScroll
        // }, 1000, 'swing'); // 400 milliseconds = 0.4 seconds
      // });
    // });
	
// JavaScript
// $(window).scroll(function() {
  // var scrollPosition = $(window).scrollTop();
  // var scrollSpeed = 1; // kecepatan scrolling
  // var scrollDirection = (scrollPosition > 0) ? 1 : -1;
  
  // // melambatkan scrolling
  // $(window).scrollTop(scrollPosition + (scrollSpeed * scrollDirection));
// });
  </script>



</body>
</html>
