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
        .pagination {
            display: flex;
			justify-content: center;
			flex-wrap: wrap;
			padding-left: 0;
			list-style: none;
        }
        .pagination li {
            margin: 0 5px;
        }
        .pagination a {
            text-decoration: none;
            color: #007bff;
        }
        .pagination a:hover {
            text-decoration: underline;
        }
		
		.pagination > li > b, .pagination > li > span {
		position: relative;
		float: left;
		padding: 6px 12px;
		line-height: 1.42857143;
		text-decoration: none;
		color: #12A;
		background-color: #fff;
		border: 1px solid #ccc;
			border-top-color: rgb(221, 221, 221);
			border-right-color: rgb(221, 221, 221);
			border-bottom-color: rgb(221, 221, 221);
			border-left-color: rgb(221, 221, 221);
		margin-left: -1px;
		}

		.bgnews{
			background-image: url('<?= base_url(); ?>assets/img/media.png'); 
			background-repeat: no-repeat; 
			background-position: right 10px bottom; 
			background-size: 600px auto;
		}

		@media (max-width: 576px) {
		.bgnews{
			background-image: url('<?= base_url(); ?>assets/img/media.png'); 
			background-repeat: no-repeat; 
			background-position: right 10px bottom; 
			background-size: 300px auto !important;
		}
		
		.pagination li {
			margin: 0px 3px !important;
		}

		.pagination a {
            text-decoration: none;
            color: #007bff;
			font-size	:9px !important;
			padding: 5px 9px !important;
			line-height: 1.4 !important;
      		}

			.pagination > li > b, .pagination > li > span {
			font-size	:9px !important;
			position: relative;
			float: left;
			padding: 5px 9px !important;
			line-height: 1.4 !important;
			text-decoration: none;
			color: #12A;
			background-color: #fff;
			border: 1px solid #ccc;
			border-top-color: rgb(221, 221, 221);
			border-right-color: rgb(221, 221, 221);
			border-bottom-color: rgb(221, 221, 221);
			border-left-color: rgb(221, 221, 221);
			margin-left: -1px;
			}
		}

		
    </style>
	<style>
	

/* 	 
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
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			padding-left: 0;
			list-style: none;
        }

		.pagination-links span, .pagination-links a {
            margin: 0 5px;
            padding: 8px 16px;
            background: #f4f4f4;
				border: 1px solid transparent;
				border-top-color: transparent;
				border-right-color: transparent;
				border-bottom-color: transparent;
				border-left-color: transparent;
				border-radius: 4px;
            text-decoration: none;
            color: #333;
        }

		.pagination-links strong {
			margin: 0 5px;
			padding: 8px 37px;
			background: #e10404c7;
			border: 1px solid transparent;
			border-top-color: transparent;
			border-right-color: transparent;
			border-bottom-color: transparent;
			border-left-color: transparent;
			border-top-color: transparent;
			border-right-color: transparent;
			border-bottom-color: transparent;
			border-left-color: transparent;
			border-radius: 4px;
			text-decoration: none;
			color: #f7f7f7;
        }

        .pagination-links .current {
            font-weight: bold;
            background: #ddd;
        }


		@media (max-width: 576px) {
			.page-link {
				padding: 8px 12px;
				font-size: 9px;
			}

			.pagination-links span, .pagination-links a {
				margin: 0 3px;
				padding: 5px 8px;
				background: #f4f4f4;
				border: 1px solid transparent;
				border-top-color: transparent;
				border-right-color: transparent;
				border-bottom-color: transparent;
				border-left-color: transparent;
				border-top-color: transparent;
				border-right-color: transparent;
				border-bottom-color: transparent;
				border-left-color: transparent;
				border-radius: 4px;
				text-decoration: none;
				color: #333;
			}

			.pagination-links strong {
				margin: 0 3px;
				padding: 5px 8px;
				background: #e10404c7;
				border: 1px solid transparent;
				border-top-color: transparent;
				border-right-color: transparent;
				border-bottom-color: transparent;
				border-left-color: transparent;
				border-top-color: transparent;
				border-right-color: transparent;
				border-bottom-color: transparent;
				border-left-color: transparent;
				border-radius: 4px;
				text-decoration: none;
				color: #f7f7f7;
			}

			.pagination-links .current {
				font-weight: bold;
				background: #ddd;
			}
		} */


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

<div class="l-main-container">
<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#"><i class="fa fa-home"></i> Home </a></li>
            <li><i class="fa fa-angle-right"></i><span> &nbsp;<?= $jdl; ?></span></li>
        </ul>
    </div>
</div>

<?php
	// if(!isset($news)){
	// 	foreach($news as $r){	
	// 		if(get_cookie('lang_is') === 'en'){
				
	// 			$headersection = "Aktivitas <b style='color:red;' >Menarik </b> Kami";
	// 			$titlehtml = "h3";
				
	// 		}else{
	// 			$headersection = "Our <b style='color:red;' >Atractive</b> Activities";
	// 			$titlehtml = "h3";
	// 		}
	// 	}
	// }else{
	// 	$headersection = "Sorry, there are no latest activity / articles";
	// 	$titlehtml = "h4";
	// }	


	if(array_key_exists(0, $news)){
		foreach($news as $r){	
			if(get_cookie('lang_is') === 'en'){
				
				$headersection = "Aktivitas <b style='color:red;' >Menarik </b> Kami";
				$titlehtml = "h3";
				
			}else{
				$headersection = "Our <b style='color:red;' >Atractive</b> Activities";
				$titlehtml = "h3";
			}	
		}
	}else{
		$headersection = "Sorry, there are no latest activity / articles";
		$titlehtml = "h4";
	}	
?> 
		
		
<section class="b-infoblock b-desc-section-container bgnews"> 
    <div class="container" style="padding-bottom: 200px;">
	<<?= $titlehtml; ?> class="f-primary-b f-center"  style="padding-bottom: 40px;"><?= $headersection; ?></<?= $titlehtml; ?>>
	
	
		
		<!-------------------- aktifitas ---------------------->
		<ul>
        <?php foreach ($news as $article): ?>
            
                <h2><?php echo $article->title; ?></h2>
                <p><?php echo $article->activity; ?></p>
                <small>Published on: <?php echo $article->recdate; ?></small>
            
        <?php endforeach; ?>
    </ul>
    
			
		<!-------------------- end aktifitas ---------------------->
		
		
    </div>

	<div class="container f-center">
        <?php echo $pagination; ?>
    </div>
</section>	
  



</div>

  <?php $this->load->view('frontend/footer.php'); ?>
  <?php $this->load->view('frontend/javascript.php'); ?>
  

</body>
</html>
