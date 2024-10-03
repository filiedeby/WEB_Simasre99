<?php
// Untuk konten statis
header("Cache-Control: public, max-age=31536000, immutable");

// Untuk konten dinamis
header("Cache-Control: no-cache, must-revalidate");

// Untuk konten sensitif
header("Cache-Control: no-store, must-revalidate");

?>
<meta charset="utf-8">
<title>Simas Reinsurance Brokers - Solusi Reasuransi Terbaik di Indonesia</title>
<meta name="author" content="Simas Reinsurance Brokers">

<meta name="keywords" content="Simas Reinsurance Brokers, pialang reasuransi Indonesia, broker reasuransi profesional, solusi reasuransi terbaik, layanan reasuransi global, pialang risiko asuransi, solusi risiko reasuransi, broker asuransi terbaik, reasuransi internasional, pialang reasuransi terpercaya.">
<meta name="description" content="Simas Reinsurance Brokers, pialang reasuransi yang mengedepankan layanan berkualitas dan solusi yang disesuaikan, membantu perusahaan asuransi menjaga stabilitas dan pertumbuhan jangka panjang.">
<meta name="robots" content="index, follow">
<link rel="canonical" href="https://simas-rb.co.id/">

<meta property="og:title" content="Simas Reinsurance Brokers - Solusi Reasuransi Terbaik">
<meta property="og:description" content="Simas Reinsurance Brokers menyediakan solusi reasuransi global dan perlindungan risiko asuransi.">
<meta property="og:image" content="<?php echo base_url(); ?>assets/images/lgsimasre.png">
<meta property="og:url" content="https://simas-rb.co.id/">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta charset="UTF-8">
<link rel="alternate" hreflang="id" href="<?php echo base_url(); ?>/lang_setter/set_to/indonesia">
<link rel="alternate" hreflang="en" href="<?php echo base_url(); ?>/lang_setter/set_to/english">
<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

<!-- bxslider -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/bxslider/jquery.bxslider.css">
<!-- End bxslider -->
<!-- flexslider -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/flexslider/flexslider.css">
<!-- End flexslider -->

<!-- bxslider -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/radial-progress/style.css">
<!-- End bxslider -->

<!-- Animate css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/css/animate.css">
<!-- End Animate css -->

<!-- fontawsome css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fontawesome6pro/css/all.min.css">
<!-- End Animate css -->

<!-- Bootstrap css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/bootstrap-progressbar/bootstrap-progressbar-3.2.0.min.css">
<!-- End Bootstrap css -->

<!-- Jquery UI css -->
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/jqueryui/jquery-ui.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/jqueryui/jquery-ui.structure.css">
<!-- End Jquery UI css -->

<!-- Fancybox -->
<!-- <link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/fancybox/jquery.fancybox.css"> -->
<!-- End Fancybox -->

<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/fonts/fonts.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<link type="text/css" data-themecolor="default" rel='stylesheet' href="<?= base_url(); ?>assets/css/main-red.css">

<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/rs-plugin/css/settings.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/rs-plugin/css/settings-custom.css">
<link type="text/css" rel='stylesheet' href="<?= base_url(); ?>assets/js/rs-plugin/videojs/video-js.css">

<style>
	.b-top-nav-show-slide {
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  cursor: pointer;
  background: #f34a53;
  padding: 5px 10px 5px 10px !important;
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
		style='color:#fff !important;
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
		style='color:#fff !important;
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
		style='color:#fff !important;
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
		style='color:#fff !important;
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
		style='color:#fff !important;
		}

		.f-slider-lg-info-l__item-title h2 {
			font-size: 2.0em !important;
			line-height: 1;
		}	
	}	

</style>


