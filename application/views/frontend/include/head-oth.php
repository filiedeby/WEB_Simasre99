<?php
// Untuk konten statis
header('Cache-Control: public, max-age=31536000, immutable');

// Untuk konten sensitif
header('Cache-Control: no-store, must-revalidate');

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="title" content="KBRU Reinsurance Brokers - Solusi Reasuransi Terbaik Indonesia">
<meta name="description" content="KBRU Reinsurance Brokers adalah pialang reasuransi yang mengedepankan layanan berkualitas dan solusi yang dapat disesuaikan untuk memenuhi kebutuhan klien di berbagai industri. Dengan pengalaman yang luas di bidang reasuransi, KBRURe berkomitmen memberikan perlindungan terbaik melalui kemitraan yang kuat, analisis risiko yang mendalam, dan pendekatan inovatif. ">
<meta name="keywords" content="KBRU Reinsurance Brokers, reinsurance, reasuransi, reinsurance brokers, broker reasuransi, pialang reasuransi Indonesia, profesional, solusi reasuransi terbaik, layanan reasuransi, pialang risiko asuransi, solusi risiko reasuransi, broker asuransi terbaik, reasuransi internasional, pialang reasuransi terpercaya">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="30 days">
<meta name="author" content="PT KBRU REINSURANCE BROKERS">
<meta name="copyright" content="PT. KBRU Reinsurance Brokers">
<meta name="robots" content="index, follow">

<meta property="og:title" content="KBRU Reinsurance Brokers - Solusi Reasuransi Terbaik Indonesia">
<meta property="og:image" content="<?php echo base_url(); ?>assets/img/kbrurebg.jpg">
<meta property="og:url" content="https://kbrure.co.id/">

<?php
$url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $url_path);
if (isset($segments[3])) {
	$cob = $segments[3];
	if ($cob == 'cob') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/cob" />';
	} elseif ($cob == 'supportc') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/supportc" />';
	} elseif ($cob == 'supportre') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/supportre" />';
	} elseif ($cob == 'visimisi') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/visimisi" />';
	} elseif ($cob == 'team') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/team" />';
	} elseif ($cob == 'activity') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/activity" />';
	} elseif ($cob == 'contact') {
		echo '<link rel="canonical" href="https://kbrure.co.id/main/contact" />';
	}
} else {
	echo '<link rel="canonical" href="https://kbrure.co.id" />';
}
?>


<script type="application/ld+json">
{
	"@context": "http://schema.org/",
	"@type": "WebSite",
	"name": "KBRURE",
	"logo": "https://kbrure.co.id/assets/images/lgsimasre.png",
	"url": "https://kbrure.co.id",
	"potentialAction": {
		"@type": "SearchAction",
		"target": "https://kbrure.co.id, https://kbrure.com, https://kbrure.id, https://simas-rb.co.id?q={search_term_string}",
		"query-input": "required name=search_term_string"
	}
}
</script>



<link rel="alternate" hreflang="id" href="<?php echo base_url(); ?>/lang_setter/set_to/indonesia">
<link rel="alternate" hreflang="en" href="<?php echo base_url(); ?>/lang_setter/set_to/english">
<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">


<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/fontawesome.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url('assets/fonts/fonts.css'); ?>">

<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/bxslider/jquery.bxslider.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/flexslider/flexslider.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/radial-progress/style.css" defer>
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/css/animate.css" defer>
<!-- End Animate css -->

<!-- fontawsome css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/all.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/regular.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/solid.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/svg-with-js.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/v4-shims.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/brands.min.css">

<script src="<?= base_url(); ?>assets/fontawesome6pro/js/fontawesome.min.js"></script>
<script src="<?= base_url(); ?>assets/fontawesome6pro/js/regular.min.js" ></script>
<script src="<?= base_url(); ?>assets/fontawesome6pro/js/solid.min.js" ></script>
<script src="<?= base_url(); ?>assets/fontawesome6pro/js/v4-shims.min.js" ></script>
<script src="<?= base_url(); ?>assets/fontawesome6pro/js/brands.min.js" ></script>


<!-- Bootstrap css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">


<!-- Jquery UI css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/jqueryui/jquery-ui.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/jqueryui/jquery-ui.structure.css">


<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link type="text/css" data-themecolor="default" rel='stylesheet' href="<?= base_url(); ?>assets/css/main-red.css">

<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/rs-plugin/css/settings.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/rs-plugin/css/settings-custom.css">
<!-- <link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/rs-plugin/videojs/video-js.css"> -->
  
  
<style>
		.b-bg-header-inner-page2 {
		background: url("<?= base_url(); ?>assets/images/bglist-01.png") no-repeat center;
		background-size: auto;
		background-size: cover;
		}

.b-rightx{
	margin: 35px 60px 0px 0px !important;
	}	

	.f-copyright {
			font-size: 0.92308em;
			line-height: 2.5;
			color: #eee;
		}
	.resizembl-logo{
		text-align: justify !important; 
		text-justify: inter-word;
	}
	.resizembl-disclaimer{
		text-align: justify !important; 
		text-justify: inter-word;
	}		

	
	.f-primary-l {
    	font-size: 3.0em !important;
		color:#fff !important;
		}

		.f-slider-lg-info-l__item-title h2 {
			font-size: 2.0em !important;
			line-height: 1;
		}	


@media screen and (max-width: 480px){

	
	.b-rightx{
		margin: 37px 48px 0px 0px !important;
	}	

	.f-copyright {
			font-size: 0.6em !important;
			line-height: 2.5;
			color: #eee;
			text-align: center !important;
		}	
	.resizembl-logo{
		text-align: center !important; 
		text-justify: inter-word;
	}
	.resizembl-disclaimer{
		text-align: justify !important; 
		text-justify: inter-word;
	}	

	
	.f-primary-l {
    font-size: 3.0em !important;
		color:#fff !important;
		}

		.f-slider-lg-info-l__item-title h2 {
			font-size: 2.0em !important;
			line-height: 1;
		}	

}

@media screen and (max-width: 768px) {
	.b-rightx{
		margin: 37px 48px 0px 0px !important;
	}	

	.f-copyright {
			font-size: 0.6em !important;
			line-height: 2.5;
			color: #eee;
			text-align: center !important;
		}
	.resizembl-logo{
		text-align: center !important; 
		text-justify: inter-word;
	}			
	.resizembl-disclaimer{
		text-align: justify !important; 
		text-justify: inter-word;
	}		

	
	.f-primary-l {
    font-size: 3.0em !important;
		color:#fff !important;
		}

		.f-slider-lg-info-l__item-title h2 {
			font-size: 2.0em !important;
			line-height: 1;
		}	

}

	
	@media screen and (min-width: 900px) {
			
		.b-rightx{
			margin: 36px 25px 0px 0px !important;
		}

		.f-copyright {
			font-size: 0.92308em;
			line-height: 2.5;
			color: #eee;
		}
		.resizembl-logo{
			text-align: justify !important; 
			text-justify: inter-word;
		}
		.resizembl-disclaimer{
			text-align: justify !important; 
			text-justify: inter-word;
		}	
		
		.f-primary-l {
    font-size: 3.0em !important;
		color:#fff !important;
		}

		.f-slider-lg-info-l__item-title h2 {
			font-size: 2.0em !important;
			line-height: 1;
		}
	
	}
	
	@media screen and (min-width: 1025px) {
		
		.b-rightx{
			margin: 36px 25px 0px 0px !important;
		}

		.f-copyright {
			font-size: 0.92308em;
			line-height: 2.5;
			color: #eee;
		}
		.resizembl-logo{
			text-align: justify !important; 
			text-justify: inter-word;
		}
		.resizembl-disclaimer{
			text-align: justify !important; 
			text-justify: inter-word;
		}	

		.f-primary-l {
    font-size: 3.0em !important;
		color:#fff !important;
		}

		.f-slider-lg-info-l__item-title h2 {
			font-size: 2.0em !important;
			line-height: 1;
		}	
	}	

</style>
